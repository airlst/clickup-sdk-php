<?php

declare(strict_types=1);

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Webhooks\CreateWebhook;
use ClickUp\V2\Requests\Webhooks\DeleteWebhook;
use ClickUp\V2\Requests\Webhooks\GetWebhooks;
use ClickUp\V2\Requests\Webhooks\UpdateWebhook;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Webhooks extends Resource
{
    /**
     * @param float|int $teamId Workspace ID
     */
    public function getWebhooks(float|int $teamId): Response
    {
        return $this->connector->send(new GetWebhooks($teamId));
    }

    /**
     * @param float|int $teamId Workspace ID
     * @param array     $events See [documentation](doc:webhooks#task-webhooks) for available event options. Use `*` to subscribe to all events.
     */
    public function createWebhook(
        float|int $teamId,
        string $endpoint,
        array $events,
        ?int $spaceId = null,
        ?int $folderId = null,
        ?int $listId = null,
        ?string $taskId = null,
    ): Response {
        return $this->connector->send(new CreateWebhook($teamId, $endpoint, $events, $spaceId, $folderId, $listId, $taskId));
    }

    /**
     * @param string $webhookId e506-4a29-9d42-26e504e3435e (uuid)
     */
    public function updateWebhook(string $webhookId, string $endpoint, mixed $events, string $status): Response
    {
        return $this->connector->send(new UpdateWebhook($webhookId, $endpoint, $events, $status));
    }

    /**
     * @param string $webhookId e506-4a29-9d42-26e504e3435e (uuid)
     */
    public function deleteWebhook(string $webhookId): Response
    {
        return $this->connector->send(new DeleteWebhook($webhookId));
    }
}
