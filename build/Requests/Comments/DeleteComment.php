<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Comments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteComment.
 *
 * Delete a task comment.
 */
class DeleteComment extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected float|int $commentId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/comment/{$this->commentId}";
    }
}
