<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Webhooks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteWebhook.
 *
 * Delete a webhook to stop monitoring the events and locations of the webhook.
 */
class DeleteWebhook extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param string $webhookId e506-4a29-9d42-26e504e3435e (uuid)
     */
    public function __construct(
        protected string $webhookId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/webhook/{$this->webhookId}";
    }
}
