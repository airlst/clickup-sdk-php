<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Comments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * UpdateComment.
 *
 * Replace the content of a task commment, assign a comment, and mark a comment as resolved.
 */
class UpdateComment extends Request
{
    protected Method $method = Method::PUT;

    public function __construct(
        protected float|int $commentId,
        protected string $commentText,
        protected int $assignee,
        protected bool $resolved,
        protected ?int $groupAssignee = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/comment/{$this->commentId}";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'comment_text' => $this->commentText,
            'assignee' => $this->assignee,
            'resolved' => $this->resolved,
            'group_assignee' => $this->groupAssignee,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
