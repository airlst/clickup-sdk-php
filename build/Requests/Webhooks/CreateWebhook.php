<?php

namespace ClickUp\V2\Requests\Webhooks;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateWebhook
 *
 * Set up a webhook to monitor for events.<br> We do not have a dedicated IP address for webhooks. We
 * use our domain name and dynamic addressing.
 */
class CreateWebhook extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/webhook";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param string $endpoint
	 * @param array $events See [documentation](doc:webhooks#task-webhooks) for available event options. Use `*` to subscribe to all events.
	 * @param null|int $spaceId
	 * @param null|int $folderId
	 * @param null|int $listId
	 * @param null|string $taskId
	 */
	public function __construct(
		protected float|int $teamId,
		protected string $endpoint,
		protected array $events,
		protected ?int $spaceId = null,
		protected ?int $folderId = null,
		protected ?int $listId = null,
		protected ?string $taskId = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'endpoint' => $this->endpoint,
			'events' => $this->events,
			'space_id' => $this->spaceId,
			'folder_id' => $this->folderId,
			'list_id' => $this->listId,
			'task_id' => $this->taskId,
		]);
	}
}
