<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\TimeTracking;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * Gettimeentrieswithinadaterange.
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

    /**
     * @param float|int      $teamId                 Workspace ID
     * @param float|int|null $startDate              Unix time in milliseconds
     * @param float|int|null $endDate                Unix time in milliseconds
     * @param float|int|null $assignee               Filter by `user_id`. For multiple assignees, separate `user_id` using commas.\
     *                                               \
     *                                               **Example:** `assignee=1234,9876`\
     *                                               \
     *                                               ***Note:** Only Workspace Owners/Admins have access to do this.*
     * @param bool|null      $includeTaskTags        include task tags in the response for time entries associated with tasks
     * @param bool|null      $includeLocationNames   include the names of the List, Folder, and Space along with the `list_id`,`folder_id`, and `space_id`
     * @param bool|null      $includeApprovalHistory Include the history of the approval for each time entry. Adds status changes, notes, and approvers.
     * @param bool|null      $includeApprovalDetails Include the details of the approval for each time entry. Adds Approver ID, Approved Time, List of Approvers, and Approval Status.
     * @param float|int|null $spaceId                only include time entries associated with tasks in a specific Space
     * @param float|int|null $folderId               only include time entries associated with tasks in a specific Folder
     * @param float|int|null $listId                 only include time entries associated with tasks in a specific List
     * @param string|null    $taskId                 only include time entries associated with a specific task
     * @param bool|null      $customTaskIds          if you want to reference a task by it's custom task id, this value must be `true`
     * @param bool|null      $isBillable             Include only billable time entries by using a value of `true` or only non-billable time entries by using a value of `false`.\
     *                                               \
     *                                               For example: `?is_billable=true`.
     */
    public function __construct(
        protected float|int $teamId,
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
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/time_entries";
    }

    protected function defaultQuery(): array
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
            'is_billable' => $this->isBillable,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
