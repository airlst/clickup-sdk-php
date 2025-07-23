<?php

namespace ClickUp\V2\Requests\Comments;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateListComment
 *
 * Add a comment to a List.
 */
class CreateListComment extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/list/{$this->listId}/comment";
	}


	/**
	 * @param float|int $listId
	 * @param string $commentText
	 * @param int $assignee
	 * @param bool $notifyAll If `notify_all` is true, notifications will be sent to everyone including the creator of the comment.
	 */
	public function __construct(
		protected float|int $listId,
		protected string $commentText,
		protected int $assignee,
		protected bool $notifyAll,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['comment_text' => $this->commentText, 'assignee' => $this->assignee, 'notify_all' => $this->notifyAll]);
	}
}
