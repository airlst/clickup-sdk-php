<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Comments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateChatViewComment.
 *
 * Add a new comment to a Chat view.
 */
class CreateChatViewComment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param string $viewId    105 (string)
     * @param bool   $notifyAll if `notify_all` is true, notifications will be sent to everyone including the creator of the comment
     */
    public function __construct(
        protected string $viewId,
        protected string $commentText,
        protected bool $notifyAll,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/view/{$this->viewId}/comment";
    }

    public function defaultBody(): array
    {
        return array_filter(['comment_text' => $this->commentText, 'notify_all' => $this->notifyAll]);
    }
}
