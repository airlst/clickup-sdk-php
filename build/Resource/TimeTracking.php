<?php

declare(strict_types=1);

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
     * @param float|int $teamId                 Workspace ID
     * @param float|int $startDate              Unix time in milliseconds
     * @param float|int $endDate                Unix time in milliseconds
     * @param float|int $assignee               Filter by `user_id`. For multiple assignees, separate `user_id` using commas.\
     *                                          \
     *                                          **Example:** `assignee=1234,9876`\
     *                                          \
     *                                          ***Note:** Only Workspace Owners/Admins have access to do this.*
     * @param bool      $includeTaskTags        include task tags in the response for time entries associated with tasks
     * @param bool      $includeLocationNames   include the names of the List, Folder, and Space along with the `list_id`,`folder_id`, and `space_id`
     * @param bool      $includeApprovalHistory Include the history of the approval for each time entry. Adds status changes, notes, and approvers.
     * @param bool      $includeApprovalDetails Include the details of the approval for each time entry. Adds Approver ID, Approved Time, List of Approvers, and Approval Status.
     * @param float|int $spaceId                only include time entries associated with tasks in a specific Space
     * @param float|int $folderId               only include time entries associated with tasks in a specific Folder
     * @param float|int $listId                 only include time entries associated with tasks in a specific List
     * @param string    $taskId                 only include time entries associated with a specific task
     * @param bool      $customTaskIds          if you want to reference a task by it's custom task id, this value must be `true`
     * @param bool      $isBillable             Include only billable time entries by using a value of `true` or only non-billable time entries by using a value of `false`.\
     *                                          \
     *                                          For example: `?is_billable=true`.
     */
    public function gettimeentrieswithinadaterange(
        float|int $teamId,
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
    ): Response {
        return $this->connector->send(new Gettimeentrieswithinadaterange($teamId, $startDate, $endDate, $assignee, $includeTaskTags, $includeLocationNames, $includeApprovalHistory, $includeApprovalDetails, $spaceId, $folderId, $listId, $taskId, $customTaskIds, $isBillable));
    }

    /**
     * @param float|int $teamId        Workspace ID
     * @param int       $duration      When there are values for both `start` and `end`, `duration` is ignored. The `stop` parameter can be used instead of the `duration` parameter.
     * @param array     $tags          users on the Business Plan and above can include a time tracking label
     * @param int       $stop          the `duration` parameter can be used instead of the `stop` parameter
     * @param int       $assignee      Workspace owners and admins can include any user id. Workspace members can only include their own user id.
     * @param bool      $customTaskIds if you want to reference a task by it's custom task id, this value must be `true`
     */
    public function createatimeentry(
        float|int $teamId,
        int $start,
        int $duration,
        ?string $description = null,
        ?array $tags = null,
        ?int $stop = null,
        ?int $end = null,
        ?bool $billable = null,
        ?int $assignee = null,
        ?string $tid = null,
        ?bool $customTaskIds = null,
    ): Response {
        return $this->connector->send(new Createatimeentry($teamId, $start, $duration, $description, $tags, $stop, $end, $billable, $assignee, $tid, $customTaskIds));
    }

    /**
     * @param float|int $teamId                 Workspace ID
     * @param string    $timerId                The ID of a time entry. \
     *                                          \
     *                                          This can be found using the [Get Time Entries Within a Date Range](ref:gettimeentrieswithinadaterange) endpoint.
     * @param bool      $includeTaskTags        include task tags in the response for time entries associated with tasks
     * @param bool      $includeLocationNames   include the names of the List, Folder, and Space along with `list_id`,`folder_id`, and `space_id`
     * @param bool      $includeApprovalHistory include the history of the approval for the time entry
     * @param bool      $includeApprovalDetails include the details of the approval for the time entry
     */
    public function getsingulartimeentry(
        float|int $teamId,
        string $timerId,
        ?bool $includeTaskTags = null,
        ?bool $includeLocationNames = null,
        ?bool $includeApprovalHistory = null,
        ?bool $includeApprovalDetails = null,
    ): Response {
        return $this->connector->send(new Getsingulartimeentry($teamId, $timerId, $includeTaskTags, $includeLocationNames, $includeApprovalHistory, $includeApprovalDetails));
    }

    /**
     * @param float|int $teamId        Workspace ID
     * @param array     $tags          users on the Business Plan and above can include a time tracking label
     * @param int       $start         when providing `start`, you must also provide `end`
     * @param int       $end           when providing `end`, you must also provide `start`
     * @param bool      $customTaskIds if you want to reference a task by it's custom task id, this value must be `true`
     */
    public function updateatimeEntry(
        float|int $teamId,
        float|int $timerId,
        array $tags,
        string $tid,
        ?string $description = null,
        ?string $tagAction = null,
        ?int $start = null,
        ?int $end = null,
        ?bool $billable = null,
        ?int $duration = null,
        ?bool $customTaskIds = null,
    ): Response {
        return $this->connector->send(new UpdateatimeEntry($teamId, $timerId, $tags, $tid, $description, $tagAction, $start, $end, $billable, $duration, $customTaskIds));
    }

    /**
     * @param float|int $teamId  Workspace ID
     * @param float|int $timerId Array of timer ids to delete separated by commas
     */
    public function deleteatimeEntry(float|int $teamId, float|int $timerId): Response
    {
        return $this->connector->send(new DeleteatimeEntry($teamId, $timerId));
    }

    /**
     * @param float|int $teamId  Workspace ID
     * @param string    $timerId The ID of a time entry. \
     *                           \
     *                           This can be found using the [Get Time Entries Within a Date Range](ref:gettimeentrieswithinadaterange) endpoint.
     */
    public function gettimeentryhistory(float|int $teamId, string $timerId): Response
    {
        return $this->connector->send(new Gettimeentryhistory($teamId, $timerId));
    }

    /**
     * @param float|int $teamId   Workspace ID
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
    public function changetagnamesfromtimeentries(
        float|int $teamId,
        string $name,
        string $newName,
        string $tagBg,
        string $tagFg,
    ): Response {
        return $this->connector->send(new Changetagnamesfromtimeentries($teamId, $name, $newName, $tagBg, $tagFg));
    }

    /**
     * @param float|int $teamId Workspace ID
     */
    public function addtagsfromtimeentries(float|int $teamId, array $timeEntryIds, array $tags): Response
    {
        return $this->connector->send(new Addtagsfromtimeentries($teamId, $timeEntryIds, $tags));
    }

    /**
     * @param float|int $teamId Workspace ID
     */
    public function removetagsfromtimeentries(float|int $teamId, array $timeEntryIds, array $tags): Response
    {
        return $this->connector->send(new Removetagsfromtimeentries($teamId, $timeEntryIds, $tags));
    }

    /**
     * @param float|int $teamId        Workspace ID
     * @param array     $tags          users on the Business Plan and above can include a time tracking label
     * @param bool      $customTaskIds if you want to reference a task by it's custom task id, this value must be `true`
     */
    public function startatimeEntry(
        float|int $teamId,
        ?string $description = null,
        ?array $tags = null,
        ?string $tid = null,
        ?bool $billable = null,
        ?bool $customTaskIds = null,
    ): Response {
        return $this->connector->send(new StartatimeEntry($teamId, $description, $tags, $tid, $billable, $customTaskIds));
    }

    /**
     * @param float|int $teamId Workspace ID
     */
    public function stopatimeEntry(float|int $teamId): Response
    {
        return $this->connector->send(new StopatimeEntry($teamId));
    }
}
