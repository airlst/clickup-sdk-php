<?php

namespace ClickUp\V2\Requests\Tasks;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateTask
 *
 * Create a new task.
 */
class CreateTask extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/list/{$this->listId}/task";
	}


	/**
	 * @param float|int $listId
	 * @param string $name
	 * @param null|string $description
	 * @param null|array $assignees
	 * @param null|bool $archived
	 * @param null|array $groupAssignees Assign multiple user groups to the task.
	 * @param null|array $tags
	 * @param null|string $status
	 * @param null|mixed $priority
	 * @param null|int $dueDate
	 * @param null|bool $dueDateTime
	 * @param null|int $timeEstimate
	 * @param null|int $startDate
	 * @param null|bool $startDateTime
	 * @param null|float|int $points Add Sprint Points to the task.
	 * @param null|bool $notifyAll If `notify_all` is true, notifications will be sent to everyone including the creator of the comment.
	 * @param null|mixed $parent You can create a subtask by including an existing task ID.\
	 *  \
	 * The `parent` task ID you include can be a subtask, but must be in the same List specified in the path parameter.
	 * @param null|string $markdownContent Markdown formatted description for the task. If both `markdown_content` and `description` are provided, `markdown_content` will be used instead of `description`.
	 * @param null|mixed $linksTo Include a task ID to create a linked dependency with your new task.
	 * @param null|bool $checkRequiredCustomFields When creating a task via API any required Custom Fields are ignored by default (`false`).\
	 *  \
	 * You can enforce required Custom Fields by including `check_required_custom_fields: true`.
	 * @param null|array $customFields [Filter by Custom Fields.](doc:filtertasks)
	 * @param null|float|int $customItemId The custom task type ID for this task. A value of `null` (default) creates a standard task type "Task".\
	 *  \
	 * To get a list of available custom task type IDs for your Workspace, use the [Get Custom Task Types endpoint](ref:getcustomitems).
	 * @param null|bool $customTaskIds If you want to reference a task by its custom task id, this value must be `true`.
	 * @param null|float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function __construct(
		protected float|int $listId,
		protected string $name,
		protected ?string $description = null,
		protected ?array $assignees = null,
		protected ?bool $archived = null,
		protected ?array $groupAssignees = null,
		protected ?array $tags = null,
		protected ?string $status = null,
		protected mixed $priority = null,
		protected ?int $dueDate = null,
		protected ?bool $dueDateTime = null,
		protected ?int $timeEstimate = null,
		protected ?int $startDate = null,
		protected ?bool $startDateTime = null,
		protected float|int|null $points = null,
		protected ?bool $notifyAll = null,
		protected mixed $parent = null,
		protected ?string $markdownContent = null,
		protected mixed $linksTo = null,
		protected ?bool $checkRequiredCustomFields = null,
		protected ?array $customFields = null,
		protected float|int|null $customItemId = null,
		protected ?bool $customTaskIds = null,
		protected float|int|null $teamId = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'name' => $this->name,
			'description' => $this->description,
			'assignees' => $this->assignees,
			'archived' => $this->archived,
			'group_assignees' => $this->groupAssignees,
			'tags' => $this->tags,
			'status' => $this->status,
			'priority' => $this->priority,
			'due_date' => $this->dueDate,
			'due_date_time' => $this->dueDateTime,
			'time_estimate' => $this->timeEstimate,
			'start_date' => $this->startDate,
			'start_date_time' => $this->startDateTime,
			'points' => $this->points,
			'notify_all' => $this->notifyAll,
			'parent' => $this->parent,
			'markdown_content' => $this->markdownContent,
			'links_to' => $this->linksTo,
			'check_required_custom_fields' => $this->checkRequiredCustomFields,
			'custom_fields' => $this->customFields,
			'custom_item_id' => $this->customItemId,
		]);
	}


	public function defaultQuery(): array
	{
		return array_filter(['custom_task_ids' => $this->customTaskIds, 'team_id' => $this->teamId]);
	}
}
