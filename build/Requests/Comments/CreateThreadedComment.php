<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Comments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * CreateThreadedComment.
 *
 * Create a threaded comment.
 */
class CreateThreadedComment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param bool $notifyAll if `notify_all` is true, notifications will be sent to everyone including the creator of the comment
     */
    public function __construct(
        protected float|int $commentId,
        protected string $commentText,
        protected bool $notifyAll,
        protected ?int $assignee = null,
        protected ?string $groupAssignee = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/comment/{$this->commentId}/reply";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'comment_text' => $this->commentText,
            'notify_all' => $this->notifyAll,
            'assignee' => $this->assignee,
            'group_assignee' => $this->groupAssignee,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
