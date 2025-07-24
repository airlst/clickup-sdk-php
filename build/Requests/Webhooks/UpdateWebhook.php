<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Webhooks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateWebhook.
 *
 * Update a webhook to change the events to be monitored.
 */
class UpdateWebhook extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param string $webhookId e506-4a29-9d42-26e504e3435e (uuid)
     */
    public function __construct(
        protected string $webhookId,
        protected string $endpoint,
        protected string $events,
        protected string $status,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/webhook/{$this->webhookId}";
    }

    public function defaultBody(): array
    {
        return ['endpoint' => $this->endpoint, 'events' => $this->events, 'status' => $this->status];
    }
}
