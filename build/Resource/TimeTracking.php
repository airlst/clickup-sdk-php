<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\TimeTracking\Addtagsfromtimeentries;
use ClickUp\V2\Requests\TimeTracking\Changetagnamesfromtimeentries;
use ClickUp\V2\Requests\TimeTracking\Createatimeentry;
use ClickUp\V2\Requests\TimeTracking\DeleteatimeEntry;
use ClickUp\V2\Requests\TimeTracking\Getalltagsfromtimeentries;
use ClickUp\V2\Requests\TimeTracking\Getrunningtimeentry;
use ClickUp\V2\Requests\TimeTracking\Getsingulartimeentry;
use ClickUp\V2\Requests\TimeTracking\Gettimeentrieswithinadaterange;
use ClickUp\V2\Requests\TimeTracking\Gettimeentryhistory;
use ClickUp\V2\Requests\TimeTracking\Removetagsfromtimeentries;
use ClickUp\V2\Requests\TimeTracking\StartatimeEntry;
use ClickUp\V2\Requests\TimeTracking\StopatimeEntry;
use ClickUp\V2\Requests\TimeTracking\UpdateatimeEntry;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class TimeTracking extends Resource
{
	/**
	 * @param float|int $teamId Workspace ID
	 * @param float|int $startDate Unix time in milliseconds
	 * @param float|int $endDate Unix time in milliseconds
	 * @param float|int $assignee Filter by `user_id`. For multiple assignees, separate `user_id` using commas.\
	 *  \
	 *  **Example:** `assignee=1234,9876`\
	 *  \
	 * ***Note:** Only Workspace Owners/Admins have access to do this.*
	 * @param bool $includeTaskTags Include task tags in the response for time entries associated with tasks.
	 * @param bool $includeLocationNames Include the names of the List, Folder, and Space along with the `list_id`,`folder_id`, and `space_id`.
	 * @param bool $includeApprovalHistory Include the history of the approval for each time entry. Adds status changes, notes, and approvers.
	 * @param bool $includeApprovalDetails Include the details of the approval for each time entry. Adds Approver ID, Approved Time, List of Approvers, and Approval Status.
	 * @param float|int $spaceId Only include time entries associated with tasks in a specific Space.
	 * @param float|int $folderId Only include time entries associated with tasks in a specific Folder.
	 * @param float|int $listId Only include time entries associated with tasks in a specific List.
	 * @param string $taskId Only include time entries associated with a specific task.
	 * @param bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 * @param bool $isBillable Include only billable time entries by using a value of `true` or only non-billable time entries by using a value of `false`.\
	 *  \
	 * For example: `?is_billable=true`.
	 */
	public function gettimeentrieswithinadaterange(
		float|int|null $teamId = null,
		float|int|null $startDate = null,
		float|int|null $endDate = null,
		float|int|null $assignee = null,
		?bool $includeTaskTags = null,
		?bool $includeLocationNames = null,
		?bool $includeApprovalHistory = null,
		?bool $includeApprovalDetails = null,
		float|int|null $spaceId = null,
		float|int|null $folderId = null,
		float|int|null $listId = null,
		?string $taskId = null,
		?bool $customTaskIds = null,
		?bool $isBillable = null,
	): Response
	{
		return $this->connector->send(new Gettimeentrieswithinadaterange($teamId, $startDate, $endDate, $assignee, $includeTaskTags, $includeLocationNames, $includeApprovalHistory, $includeApprovalDetails, $spaceId, $folderId, $listId, $taskId, $customTaskIds, $teamId, $isBillable));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function createatimeentry(float|int|null $teamId = null, ?bool $customTaskIds = null): Response
	{
		return $this->connector->send(new Createatimeentry($teamId, $customTaskIds, $teamId));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param string $timerId The ID of a time entry. \
	 *  \
	 * This can be found using the [Get Time Entries Within a Date Range](ref:gettimeentrieswithinadaterange) endpoint.
	 * @param bool $includeTaskTags Include task tags in the response for time entries associated with tasks.
	 * @param bool $includeLocationNames Include the names of the List, Folder, and Space along with `list_id`,`folder_id`, and `space_id`.
	 * @param bool $includeApprovalHistory Include the history of the approval for the time entry.
	 * @param bool $includeApprovalDetails Include the details of the approval for the time entry.
	 */
	public function getsingulartimeentry(
		float|int $teamId,
		string $timerId,
		?bool $includeTaskTags = null,
		?bool $includeLocationNames = null,
		?bool $includeApprovalHistory = null,
		?bool $includeApprovalDetails = null,
	): Response
	{
		return $this->connector->send(new Getsingulartimeentry($teamId, $timerId, $includeTaskTags, $includeLocationNames, $includeApprovalHistory, $includeApprovalDetails));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param float|int $timerId
	 * @param bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`
	 */
	public function updateatimeEntry(
		float|int|null $teamId = null,
		float|int $timerId,
		?bool $customTaskIds = null,
	): Response
	{
		return $this->connector->send(new UpdateatimeEntry($teamId, $timerId, $customTaskIds, $teamId));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param float|int $timerId Array of timer ids to delete separated by commas
	 */
	public function deleteatimeEntry(float|int $teamId, float|int $timerId): Response
	{
		return $this->connector->send(new DeleteatimeEntry($teamId, $timerId));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param string $timerId The ID of a time entry. \
	 *  \
	 * This can be found using the [Get Time Entries Within a Date Range](ref:gettimeentrieswithinadaterange) endpoint.
	 */
	public function gettimeentryhistory(float|int $teamId, string $timerId): Response
	{
		return $this->connector->send(new Gettimeentryhistory($teamId, $timerId));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param float|int $assignee user id
	 */
	public function getrunningtimeentry(float|int $teamId, float|int|null $assignee = null): Response
	{
		return $this->connector->send(new Getrunningtimeentry($teamId, $assignee));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function getalltagsfromtimeentries(float|int $teamId): Response
	{
		return $this->connector->send(new Getalltagsfromtimeentries($teamId));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function changetagnamesfromtimeentries(float|int $teamId): Response
	{
		return $this->connector->send(new Changetagnamesfromtimeentries($teamId));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function addtagsfromtimeentries(float|int $teamId): Response
	{
		return $this->connector->send(new Addtagsfromtimeentries($teamId));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function removetagsfromtimeentries(float|int $teamId): Response
	{
		return $this->connector->send(new Removetagsfromtimeentries($teamId));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function startatimeEntry(float|int|null $teamId = null, ?bool $customTaskIds = null): Response
	{
		return $this->connector->send(new StartatimeEntry($teamId, $customTaskIds, $teamId));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function stopatimeEntry(float|int $teamId): Response
	{
		return $this->connector->send(new StopatimeEntry($teamId));
	}
}
