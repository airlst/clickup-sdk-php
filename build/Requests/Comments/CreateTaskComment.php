<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Comments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateTaskComment.
 *
 * Add a new comment to a task.
 */
class CreateTaskComment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param bool           $notifyAll     if `notify_all` is true, notifications will be sent to everyone including the creator of the comment
     * @param bool|null      $customTaskIds if you want to reference a task by it's custom task id, this value must be `true`
     * @param float|int|null $teamId        When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
     *                                      \
     *                                      For example: `custom_task_ids=true&team_id=123`.
     */
    public function __construct(
        protected string $taskId,
        protected string $commentText,
        protected bool $notifyAll,
        protected ?int $assignee = null,
        protected ?string $groupAssignee = null,
        protected ?bool $customTaskIds = null,
        protected float|int|null $teamId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/task/{$this->taskId}/comment";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'comment_text' => $this->commentText,
            'notify_all' => $this->notifyAll,
            'assignee' => $this->assignee,
            'group_assignee' => $this->groupAssignee,
        ]);
    }

    protected function defaultQuery(): array
    {
        return array_filter(['custom_task_ids' => $this->customTaskIds, 'team_id' => $this->teamId]);
    }
}
