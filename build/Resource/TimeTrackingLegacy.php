<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\TimeTrackingLegacy\Deletetimetracked;
use ClickUp\V2\Requests\TimeTrackingLegacy\Edittimetracked;
use ClickUp\V2\Requests\TimeTrackingLegacy\Gettrackedtime;
use ClickUp\V2\Requests\TimeTrackingLegacy\Tracktime;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class TimeTrackingLegacy extends Resource
{
	/**
	 * @param string $taskId
	 * @param bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function gettrackedtime(string $taskId, ?bool $customTaskIds = null, float|int|null $teamId = null): Response
	{
		return $this->connector->send(new Gettrackedtime($taskId, $customTaskIds, $teamId));
	}


	/**
	 * @param string $taskId
	 * @param int $start
	 * @param int $end
	 * @param int $time
	 * @param bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function tracktime(
		string $taskId,
		int $start,
		int $end,
		int $time,
		?bool $customTaskIds = null,
		float|int|null $teamId = null,
	): Response
	{
		return $this->connector->send(new Tracktime($taskId, $start, $end, $time, $customTaskIds, $teamId));
	}


	/**
	 * @param string $taskId
	 * @param string $intervalId
	 * @param int $start
	 * @param int $end
	 * @param int $time
	 * @param bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function edittimetracked(
		string $taskId,
		string $intervalId,
		int $start,
		int $end,
		int $time,
		?bool $customTaskIds = null,
		float|int|null $teamId = null,
	): Response
	{
		return $this->connector->send(new Edittimetracked($taskId, $intervalId, $start, $end, $time, $customTaskIds, $teamId));
	}


	/**
	 * @param string $taskId
	 * @param string $intervalId
	 * @param bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function deletetimetracked(
		string $taskId,
		string $intervalId,
		?bool $customTaskIds = null,
		float|int|null $teamId = null,
	): Response
	{
		return $this->connector->send(new Deletetimetracked($taskId, $intervalId, $customTaskIds, $teamId));
	}
}
