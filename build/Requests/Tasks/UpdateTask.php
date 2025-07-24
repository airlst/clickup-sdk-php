<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Tasks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * UpdateTask.
 *
 * Update a task by including one or more fields in the request body.
 */
class UpdateTask extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param mixed|null     $customItemId    The custom task type ID for this task. A value of `null` (default) sets the task type to type "Task".\
     *                                        \
     *                                        To get a list of available custom task type IDs for your Workspace, use the [Get Custom Task Types endpoint](ref:getcustomitems).
     * @param string|null    $description     to clear the task description, include `Description` with `" "`
     * @param string|null    $markdownContent Markdown formatted description for the task. If both `markdown_content` and `description` are provided, `markdown_content` will be used instead of `description`.
     * @param string|null    $parent          You can move a subtask to another parent task by including `"parent"` with a valid `task id`.\
     *                                        \
     *                                        You cannot convert a subtask to a task by setting `"parent"` to `null`.
     * @param float|int|null $points          update the task's Sprint Points
     * @param bool|null      $customTaskIds   if you want to reference a task by its custom task id, this value must be `true`
     * @param float|int|null $teamId          When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
     *                                        \
     *                                        For example: `custom_task_ids=true&team_id=123`.
     */
    public function __construct(
        protected string $taskId,
        protected mixed $customItemId = null,
        protected ?string $name = null,
        protected ?string $description = null,
        protected ?string $markdownContent = null,
        protected ?string $status = null,
        protected ?int $priority = null,
        protected ?int $dueDate = null,
        protected ?bool $dueDateTime = null,
        protected ?string $parent = null,
        protected ?int $timeEstimate = null,
        protected ?int $startDate = null,
        protected ?bool $startDateTime = null,
        protected float|int|null $points = null,
        protected ?array $assignees = null,
        protected ?array $groupAssignees = null,
        protected ?array $watchers = null,
        protected ?bool $archived = null,
        protected ?bool $customTaskIds = null,
        protected float|int|null $teamId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/task/{$this->taskId}";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'custom_item_id' => $this->customItemId,
            'name' => $this->name,
            'description' => $this->description,
            'markdown_content' => $this->markdownContent,
            'status' => $this->status,
            'priority' => $this->priority,
            'due_date' => $this->dueDate,
            'due_date_time' => $this->dueDateTime,
            'parent' => $this->parent,
            'time_estimate' => $this->timeEstimate,
            'start_date' => $this->startDate,
            'start_date_time' => $this->startDateTime,
            'points' => $this->points,
            'assignees' => $this->assignees,
            'group_assignees' => $this->groupAssignees,
            'watchers' => $this->watchers,
            'archived' => $this->archived,
        ], fn (mixed $value): bool => ! is_null($value));
    }

    protected function defaultQuery(): array
    {
        return array_filter(['custom_task_ids' => $this->customTaskIds, 'team_id' => $this->teamId], fn (mixed $value): bool => ! is_null($value));
    }
}
