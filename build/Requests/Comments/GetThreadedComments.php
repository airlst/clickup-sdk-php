<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Comments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetThreadedComments.
 *
 * View threaded comments. The parent comment is not included in the response.
 */
class GetThreadedComments extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected float|int $commentId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/comment/{$this->commentId}/reply";
    }
}
