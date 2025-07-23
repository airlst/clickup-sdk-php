<?php

namespace ClickUp\V2\Requests\Comments;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateChatViewComment
 *
 * Add a new comment to a Chat view.
 */
class CreateChatViewComment extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/view/{$this->viewId}/comment";
	}


	/**
	 * @param string $viewId 105 (string)
	 * @param string $commentText
	 * @param bool $notifyAll If `notify_all` is true, notifications will be sent to everyone including the creator of the comment.
	 */
	public function __construct(
		protected string $viewId,
		protected string $commentText,
		protected bool $notifyAll,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['comment_text' => $this->commentText, 'notify_all' => $this->notifyAll]);
	}
}
