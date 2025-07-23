<?php

namespace ClickUp\V2\Requests\TimeTrackingLegacy;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Gettrackedtime
 *
 * ***Note:** This is a legacy time tracking endpoint. We recommend using the Time Tracking API
 * endpoints to manage time entries.*
 */
class Gettrackedtime extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/task/{$this->taskId}/time";
	}


	/**
	 * @param string $taskId
	 * @param null|bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
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
