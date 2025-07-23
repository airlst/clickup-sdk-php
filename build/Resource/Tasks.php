<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Tasks\CreateTask;
use ClickUp\V2\Requests\Tasks\CreateTaskFromTemplate;
use ClickUp\V2\Requests\Tasks\DeleteTask;
use ClickUp\V2\Requests\Tasks\GetBulkTaskstimeinStatus;
use ClickUp\V2\Requests\Tasks\GetFilteredTeamTasks;
use ClickUp\V2\Requests\Tasks\GetTask;
use ClickUp\V2\Requests\Tasks\GetTaskTimeinStatus;
use ClickUp\V2\Requests\Tasks\GetTasks;
use ClickUp\V2\Requests\Tasks\MergeTasks;
use ClickUp\V2\Requests\Tasks\UpdateTask;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Tasks extends Resource
{
	/**
	 * @param float|int $listId To find the list_id: \ 1. In the Sidebar, hover over the List and click the **ellipsis ...** menu. \ 2. Select **Copy link.** \ 3. Use the copied URL to find the list_id. The list_id is the number that follows /li in the URL.
	 * @param bool $archived
	 * @param bool $includeMarkdownDescription To return task descriptions in Markdown format, use `?include_markdown_description=true`.
	 * @param int $page Page to fetch (starts at 0).
	 * @param string $orderBy Order by a particular field. By default, tasks are ordered by `created`.\
	 *  \
	 * Options include: `id`, `created`, `updated`, and `due_date`.
	 * @param bool $reverse Tasks are displayed in reverse order.
	 * @param bool $subtasks Include or exclude subtasks. By default, subtasks are excluded.
	 * @param array $statuses Filter by statuses. To include closed tasks, use the `include_closed` parameter. \
	 *  \
	 * For example: \
	 *  \
	 * `?statuses[]=to%20do&statuses[]=in%20progress`
	 * @param bool $includeClosed Include or excluse closed tasks. By default, they are excluded.\
	 *  \
	 * To include closed tasks, use `include_closed: true`.
	 * @param array $assignees Filter by Assignees. For example: \
	 *  \
	 * `?assignees[]=1234&assignees[]=5678`
	 * @param array $watchers Filter by watchers.
	 * @param array $tags Filter by tags. For example: \
	 *  \
	 * `?tags[]=tag1&tags[]=this%20tag`
	 * @param int $dueDateGt Filter by due date greater than Unix time in milliseconds.
	 * @param int $dueDateLt Filter by due date less than Unix time in milliseconds.
	 * @param int $dateCreatedGt Filter by date created greater than Unix time in milliseconds.
	 * @param int $dateCreatedLt Filter by date created less than Unix time in milliseconds.
	 * @param int $dateUpdatedGt Filter by date updated greater than Unix time in milliseconds.
	 * @param int $dateUpdatedLt Filter by date updated less than Unix time in milliseconds.
	 * @param int $dateDoneGt Filter by date done greater than Unix time in milliseconds.
	 * @param int $dateDoneLt Filter by date done less than Unix time in milliseconds.
	 * @param array $customFields Include tasks with specific values in one or more Custom Fields. Custom Relationships are included.\
	 *  \
	 * For example: `?custom_fields=[{"field_id":"abcdefghi12345678","operator":"=","value":"1234"},{"field_id":"jklmnop123456","operator":"<","value":"5"}]`\
	 *  \
	 * Only set Custom Field values display in the `value` property of the `custom_fields` parameter. If you want to include tasks with specific values in only one Custom Field, use `custom_field` instead.\
	 *  \
	 * Learn more about [filtering using Custom Fields.](doc:taskfilters)
	 * @param array $customField Include tasks with specific values in only one Custom Field. This Custom Field can be a Custom Relationship.
	 * @param array $customItems Filter by custom task types. For example: \
	 *  \
	 * `?custom_items[]=0&custom_items[]=1300` \
	 *  \
	 * Including `0` returns tasks. Including `1` returns Milestones. Including any other number returns the custom task type as defined in your Workspace.
	 */
	public function getTasks(
		float|int $listId,
		?bool $archived = null,
		?bool $includeMarkdownDescription = null,
		?int $page = null,
		?string $orderBy = null,
		?bool $reverse = null,
		?bool $subtasks = null,
		?array $statuses = null,
		?bool $includeClosed = null,
		?array $assignees = null,
		?array $watchers = null,
		?array $tags = null,
		?int $dueDateGt = null,
		?int $dueDateLt = null,
		?int $dateCreatedGt = null,
		?int $dateCreatedLt = null,
		?int $dateUpdatedGt = null,
		?int $dateUpdatedLt = null,
		?int $dateDoneGt = null,
		?int $dateDoneLt = null,
		?array $customFields = null,
		?array $customField = null,
		?array $customItems = null,
	): Response
	{
		return $this->connector->send(new GetTasks($listId, $archived, $includeMarkdownDescription, $page, $orderBy, $reverse, $subtasks, $statuses, $includeClosed, $assignees, $watchers, $tags, $dueDateGt, $dueDateLt, $dateCreatedGt, $dateCreatedLt, $dateUpdatedGt, $dateUpdatedLt, $dateDoneGt, $dateDoneLt, $customFields, $customField, $customItems));
	}


	/**
	 * @param float|int $listId
	 * @param string $name
	 * @param string $description
	 * @param array $assignees
	 * @param bool $archived
	 * @param array $groupAssignees Assign multiple user groups to the task.
	 * @param array $tags
	 * @param string $status
	 * @param mixed $priority
	 * @param int $dueDate
	 * @param bool $dueDateTime
	 * @param int $timeEstimate
	 * @param int $startDate
	 * @param bool $startDateTime
	 * @param float|int $points Add Sprint Points to the task.
	 * @param bool $notifyAll If `notify_all` is true, notifications will be sent to everyone including the creator of the comment.
	 * @param mixed $parent You can create a subtask by including an existing task ID.\
	 *  \
	 * The `parent` task ID you include can be a subtask, but must be in the same List specified in the path parameter.
	 * @param string $markdownContent Markdown formatted description for the task. If both `markdown_content` and `description` are provided, `markdown_content` will be used instead of `description`.
	 * @param mixed $linksTo Include a task ID to create a linked dependency with your new task.
	 * @param bool $checkRequiredCustomFields When creating a task via API any required Custom Fields are ignored by default (`false`).\
	 *  \
	 * You can enforce required Custom Fields by including `check_required_custom_fields: true`.
	 * @param array $customFields [Filter by Custom Fields.](doc:filtertasks)
	 * @param float|int $customItemId The custom task type ID for this task. A value of `null` (default) creates a standard task type "Task".\
	 *  \
	 * To get a list of available custom task type IDs for your Workspace, use the [Get Custom Task Types endpoint](ref:getcustomitems).
	 * @param bool $customTaskIds If you want to reference a task by its custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function createTask(
		float|int $listId,
		string $name,
		?string $description = null,
		?array $assignees = null,
		?bool $archived = null,
		?array $groupAssignees = null,
		?array $tags = null,
		?string $status = null,
		mixed $priority = null,
		?int $dueDate = null,
		?bool $dueDateTime = null,
		?int $timeEstimate = null,
		?int $startDate = null,
		?bool $startDateTime = null,
		float|int|null $points = null,
		?bool $notifyAll = null,
		mixed $parent = null,
		?string $markdownContent = null,
		mixed $linksTo = null,
		?bool $checkRequiredCustomFields = null,
		?array $customFields = null,
		float|int|null $customItemId = null,
		?bool $customTaskIds = null,
		float|int|null $teamId = null,
	): Response
	{
		return $this->connector->send(new CreateTask($listId, $name, $description, $assignees, $archived, $groupAssignees, $tags, $status, $priority, $dueDate, $dueDateTime, $timeEstimate, $startDate, $startDateTime, $points, $notifyAll, $parent, $markdownContent, $linksTo, $checkRequiredCustomFields, $customFields, $customItemId, $customTaskIds, $teamId));
	}


	/**
	 * @param string $taskId
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 * @param bool $includeSubtasks Include subtasks, default false
	 * @param bool $includeMarkdownDescription To return task descriptions in Markdown format, use `?include_markdown_description=true`.
	 * @param array $customFields Include tasks with specific values in one or more Custom Fields. Custom Relationships are included.\
	 *  \
	 * For example: `?custom_fields=[{"field_id":"abcdefghi12345678","operator":"=","value":"1234"},{"field_id":"jklmnop123456","operator":"<","value":"5"}]`\
	 *  \
	 * Only set Custom Field values display in the `value` property of the `custom_fields` parameter. If you want to include tasks with specific values in only one Custom Field, use `custom_field` instead.\
	 *  \
	 * Learn more about [filtering using Custom Fields.](doc:filtertasks)
	 */
	public function getTask(
		string $taskId,
		float|int|null $teamId = null,
		?bool $includeSubtasks = null,
		?bool $includeMarkdownDescription = null,
		?array $customFields = null,
	): Response
	{
		return $this->connector->send(new GetTask($taskId, $teamId, $includeSubtasks, $includeMarkdownDescription, $customFields));
	}


	/**
	 * @param string $taskId
	 * @param mixed $customItemId The custom task type ID for this task. A value of `null` (default) sets the task type to type "Task".\
	 *  \
	 * To get a list of available custom task type IDs for your Workspace, use the [Get Custom Task Types endpoint](ref:getcustomitems).
	 * @param string $name
	 * @param string $description To clear the task description, include `Description` with `" "`.
	 * @param string $markdownContent Markdown formatted description for the task. If both `markdown_content` and `description` are provided, `markdown_content` will be used instead of `description`.
	 * @param string $status
	 * @param int $priority
	 * @param int $dueDate
	 * @param bool $dueDateTime
	 * @param string $parent You can move a subtask to another parent task by including `"parent"` with a valid `task id`.\
	 *  \
	 * You cannot convert a subtask to a task by setting `"parent"` to `null`.
	 * @param int $timeEstimate
	 * @param int $startDate
	 * @param bool $startDateTime
	 * @param float|int $points Update the task's Sprint Points.
	 * @param array $assignees
	 * @param array $groupAssignees
	 * @param array $watchers
	 * @param bool $archived
	 * @param bool $customTaskIds If you want to reference a task by its custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function updateTask(
		string $taskId,
		mixed $customItemId = null,
		?string $name = null,
		?string $description = null,
		?string $markdownContent = null,
		?string $status = null,
		?int $priority = null,
		?int $dueDate = null,
		?bool $dueDateTime = null,
		?string $parent = null,
		?int $timeEstimate = null,
		?int $startDate = null,
		?bool $startDateTime = null,
		float|int|null $points = null,
		?array $assignees = null,
		?array $groupAssignees = null,
		?array $watchers = null,
		?bool $archived = null,
		?bool $customTaskIds = null,
		float|int|null $teamId = null,
	): Response
	{
		return $this->connector->send(new UpdateTask($taskId, $customItemId, $name, $description, $markdownContent, $status, $priority, $dueDate, $dueDateTime, $parent, $timeEstimate, $startDate, $startDateTime, $points, $assignees, $groupAssignees, $watchers, $archived, $customTaskIds, $teamId));
	}


	/**
	 * @param string $taskId
	 * @param bool $customTaskIds If you want to reference a task by its custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function deleteTask(string $taskId, ?bool $customTaskIds = null, float|int|null $teamId = null): Response
	{
		return $this->connector->send(new DeleteTask($taskId, $customTaskIds, $teamId));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param int $page Page to fetch (starts at 0).
	 * @param string $orderBy Order by a particular field. By default, tasks are ordered by `created`.\
	 *  \
	 * Options include: `id`, `created`, `updated`, and `due_date`.
	 * @param bool $reverse Tasks are displayed in reverse order.
	 * @param bool $subtasks Include or exclude subtasks. By default, subtasks are excluded.
	 * @param array $spaceIds Filter by Spaces. For example: \
	 *  \
	 * `?space_ids[]=1234&space_ids[]=6789`
	 * @param array $projectIds Filter by Folders. For example: \
	 *  \
	 * `?project_ids[]=1234&project_ids[]=6789`
	 * @param array $listIds Filter by Lists. For example: \
	 *  \
	 * `?list_ids[]=1234&list_ids[]=6789`
	 * @param array $statuses Filter by statuses. Use `%20` to represent a space character. To include closed tasks, use the `include_closed` parameter. \
	 *  \
	 * For example: \
	 *  \
	 * `?statuses[]=to%20do&statuses[]=in%20progress`
	 * @param bool $includeClosed Include or excluse closed tasks. By default, they are excluded.\
	 *  \
	 * To include closed tasks, use `include_closed: true`.
	 * @param array $assignees Filter by Assignees using people's ClickUp user id. For example: \
	 *  \
	 * `?assignees[]=1234&assignees[]=5678`
	 * @param array $tags Filter by tags. User `%20` to represent a space character. For example: \
	 *  \
	 * `?tags[]=tag1&tags[]=this%20tag`
	 * @param int $dueDateGt Filter by due date greater than Unix time in milliseconds.
	 * @param int $dueDateLt Filter by due date less than Unix time in milliseconds.
	 * @param int $dateCreatedGt Filter by date created greater than Unix time in milliseconds.
	 * @param int $dateCreatedLt Filter by date created less than Unix time in milliseconds.
	 * @param int $dateUpdatedGt Filter by date updated greater than Unix time in milliseconds.
	 * @param int $dateUpdatedLt Filter by date updated less than Unix time in milliseconds.
	 * @param int $dateDoneGt Filter by date done greater than Unix time in milliseconds.
	 * @param int $dateDoneLt Filter by date done less than Unix time in milliseconds.
	 * @param array $customFields Include tasks with specific values in one or more Custom Fields. Custom Relationships are included.\
	 *  \
	 * For example: `?custom_fields=[{"field_id":"abcdefghi12345678","operator":"=","value":"1234"}{"field_id":"jklmnop123456","operator":"<","value":"5"}]`\
	 *  \
	 * Only set Custom Field values display in the `value` property of the `custom_fields` parameter. The `=` operator isn't supported with Label Custom Fields.\
	 *  \
	 * Learn more about [filtering using Custom Fields.](doc:taskfilters)
	 * @param bool $customTaskIds If you want to reference a task by its custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 * @param string $parent Include the parent task ID to return subtasks.
	 * @param bool $includeMarkdownDescription To return task descriptions in Markdown format, use `?include_markdown_description=true`.
	 * @param array $customItems Filter by custom task types. For example: \
	 *  \
	 * `?custom_items[]=0&custom_items[]=1300` \
	 *  \
	 * Including `0` returns tasks. Including `1` returns Milestones. Including any other number returns the custom task type as defined in your Workspace.
	 */
	public function getFilteredTeamTasks(
		float|int|null $teamId = null,
		?int $page = null,
		?string $orderBy = null,
		?bool $reverse = null,
		?bool $subtasks = null,
		?array $spaceIds = null,
		?array $projectIds = null,
		?array $listIds = null,
		?array $statuses = null,
		?bool $includeClosed = null,
		?array $assignees = null,
		?array $tags = null,
		?int $dueDateGt = null,
		?int $dueDateLt = null,
		?int $dateCreatedGt = null,
		?int $dateCreatedLt = null,
		?int $dateUpdatedGt = null,
		?int $dateUpdatedLt = null,
		?int $dateDoneGt = null,
		?int $dateDoneLt = null,
		?array $customFields = null,
		?bool $customTaskIds = null,
		?string $parent = null,
		?bool $includeMarkdownDescription = null,
		?array $customItems = null,
	): Response
	{
		return $this->connector->send(new GetFilteredTeamTasks($teamId, $page, $orderBy, $reverse, $subtasks, $spaceIds, $projectIds, $listIds, $statuses, $includeClosed, $assignees, $tags, $dueDateGt, $dueDateLt, $dateCreatedGt, $dateCreatedLt, $dateUpdatedGt, $dateUpdatedLt, $dateDoneGt, $dateDoneLt, $customFields, $customTaskIds, $teamId, $parent, $includeMarkdownDescription, $customItems));
	}


	/**
	 * @param string $taskId ID of the target task that other tasks will be merged into.
	 * @param array $sourceTaskIds Array of task IDs to merge into the target task.
	 */
	public function mergeTasks(string $taskId, array $sourceTaskIds): Response
	{
		return $this->connector->send(new MergeTasks($taskId, $sourceTaskIds));
	}


	/**
	 * @param string $taskId
	 * @param bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function getTaskTimeinStatus(
		string $taskId,
		?bool $customTaskIds = null,
		float|int|null $teamId = null,
	): Response
	{
		return $this->connector->send(new GetTaskTimeinStatus($taskId, $customTaskIds, $teamId));
	}


	/**
	 * @param string $taskIds Include this paramater once per `task_id`.
	 * You can include up to 100 task ids per request.
	 * For example: `task_ids=3cuh&task_ids=g4fs`
	 * @param bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function getBulkTaskstimeinStatus(
		string $taskIds,
		?bool $customTaskIds = null,
		float|int|null $teamId = null,
	): Response
	{
		return $this->connector->send(new GetBulkTaskstimeinStatus($taskIds, $customTaskIds, $teamId));
	}


	/**
	 * @param float|int $listId
	 * @param string $templateId
	 * @param string $name
	 */
	public function createTaskFromTemplate(float|int $listId, string $templateId, string $name): Response
	{
		return $this->connector->send(new CreateTaskFromTemplate($listId, $templateId, $name));
	}
}
