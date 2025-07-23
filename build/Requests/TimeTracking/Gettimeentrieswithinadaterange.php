<?php

namespace ClickUp\V2\Requests\TimeTracking;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Gettimeentrieswithinadaterange
 *
 * View time entries filtered by start and end date. \
 *  \
 * By default, this endpoint returns time
 * entries from the last 30 days created by the authenticated user. \
 *  \
 * To retrieve time entries for
 * other users, you must include the `assignee` query parameter. \
 *  \
 * Only one of the following
 * location filters can be included at a time: `space_id`, `folder_id`, `list_id`, or `task_id`. \
 *
 * \
 * ***Note:** A time entry that has a negative duration means that timer is currently running for
 * that user.*
 */
class Gettimeentrieswithinadaterange extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/time_entries";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param null|float|int $startDate Unix time in milliseconds
	 * @param null|float|int $endDate Unix time in milliseconds
	 * @param null|float|int $assignee Filter by `user_id`. For multiple assignees, separate `user_id` using commas.\
	 *  \
	 *  **Example:** `assignee=1234,9876`\
	 *  \
	 * ***Note:** Only Workspace Owners/Admins have access to do this.*
	 * @param null|bool $includeTaskTags Include task tags in the response for time entries associated with tasks.
	 * @param null|bool $includeLocationNames Include the names of the List, Folder, and Space along with the `list_id`,`folder_id`, and `space_id`.
	 * @param null|bool $includeApprovalHistory Include the history of the approval for each time entry. Adds status changes, notes, and approvers.
	 * @param null|bool $includeApprovalDetails Include the details of the approval for each time entry. Adds Approver ID, Approved Time, List of Approvers, and Approval Status.
	 * @param null|float|int $spaceId Only include time entries associated with tasks in a specific Space.
	 * @param null|float|int $folderId Only include time entries associated with tasks in a specific Folder.
	 * @param null|float|int $listId Only include time entries associated with tasks in a specific List.
	 * @param null|string $taskId Only include time entries associated with a specific task.
	 * @param null|bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param null|float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 * @param null|bool $isBillable Include only billable time entries by using a value of `true` or only non-billable time entries by using a value of `false`.\
	 *  \
	 * For example: `?is_billable=true`.
	 */
	public function __construct(
		protected float|int|null $teamId = null,
		protected float|int|null $startDate = null,
		protected float|int|null $endDate = null,
		protected float|int|null $assignee = null,
		protected ?bool $includeTaskTags = null,
		protected ?bool $includeLocationNames = null,
		protected ?bool $includeApprovalHistory = null,
		protected ?bool $includeApprovalDetails = null,
		protected float|int|null $spaceId = null,
		protected float|int|null $folderId = null,
		protected float|int|null $listId = null,
		protected ?string $taskId = null,
		protected ?bool $customTaskIds = null,
		protected ?bool $isBillable = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'start_date' => $this->startDate,
			'end_date' => $this->endDate,
			'assignee' => $this->assignee,
			'include_task_tags' => $this->includeTaskTags,
			'include_location_names' => $this->includeLocationNames,
			'include_approval_history' => $this->includeApprovalHistory,
			'include_approval_details' => $this->includeApprovalDetails,
			'space_id' => $this->spaceId,
			'folder_id' => $this->folderId,
			'list_id' => $this->listId,
			'task_id' => $this->taskId,
			'custom_task_ids' => $this->customTaskIds,
			'team_id' => $this->teamId,
			'is_billable' => $this->isBillable,
		]);
	}
}
