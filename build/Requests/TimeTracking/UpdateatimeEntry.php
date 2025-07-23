<?php

namespace ClickUp\V2\Requests\TimeTracking;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateatimeEntry
 *
 * Update the details of a time entry.
 */
class UpdateatimeEntry extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/time_entries/{$this->timerId}";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param float|int $timerId
	 * @param null|bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param null|float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`
	 */
	public function __construct(
		protected float|int|null $teamId = null,
		protected float|int $timerId,
		protected ?bool $customTaskIds = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['custom_task_ids' => $this->customTaskIds, 'team_id' => $this->teamId]);
	}
}
