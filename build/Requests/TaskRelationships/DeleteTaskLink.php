<?php

namespace ClickUp\V2\Requests\TaskRelationships;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteTaskLink
 *
 * Remove the link between two tasks.
 */
class DeleteTaskLink extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v2/task/{$this->taskId}/link/{$this->linksTo}";
	}


	/**
	 * @param string $taskId
	 * @param string $linksTo
	 * @param null|bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param null|float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function __construct(
		protected string $taskId,
		protected string $linksTo,
		protected ?bool $customTaskIds = null,
		protected float|int|null $teamId = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['custom_task_ids' => $this->customTaskIds, 'team_id' => $this->teamId]);
	}
}
