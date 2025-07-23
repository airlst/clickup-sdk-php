<?php

namespace ClickUp\V2\Requests\Tasks;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetBulkTasks'TimeinStatus
 *
 * View how long two or more tasks have been in each status. The Total time in Status ClickApp must
 * first be enabled by the Workspace owner or an admin.
 */
class GetBulkTaskstimeinStatus extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/task/bulk_time_in_status/task_ids";
	}


	/**
	 * @param string $taskIds Include this paramater once per `task_id`.
	 * You can include up to 100 task ids per request.
	 * For example: `task_ids=3cuh&task_ids=g4fs`
	 * @param null|bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param null|float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function __construct(
		protected string $taskIds,
		protected ?bool $customTaskIds = null,
		protected float|int|null $teamId = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['task_ids' => $this->taskIds, 'custom_task_ids' => $this->customTaskIds, 'team_id' => $this->teamId]);
	}
}
