<?php

namespace ClickUp\V2\Requests\Tasks;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateTask
 *
 * Update a task by including one or more fields in the request body.
 */
class UpdateTask extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/v2/task/{$this->taskId}";
	}


	/**
	 * @param string $taskId
	 * @param null|bool $customTaskIds If you want to reference a task by its custom task id, this value must be `true`.
	 * @param null|float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function __construct(
		protected string $taskId,
		protected ?bool $customTaskIds = null,
		protected float|int|null $teamId = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['custom_task_ids' => $this->customTaskIds, 'team_id' => $this->teamId]);
	}
}
