<?php

namespace ClickUp\V2\Requests\Webhooks;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateWebhook
 *
 * Update a webhook to change the events to be monitored.
 */
class UpdateWebhook extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/v2/webhook/{$this->webhookId}";
	}


	/**
	 * @param string $webhookId e506-4a29-9d42-26e504e3435e (uuid)
	 * @param string $endpoint
	 * @param string $events
	 * @param string $status
	 */
	public function __construct(
		protected string $webhookId,
		protected string $endpoint,
		protected string $events,
		protected string $status,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['endpoint' => $this->endpoint, 'events' => $this->events, 'status' => $this->status]);
	}
}
