<?php

namespace ClickUp\V2\Requests\Comments;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateThreadedComment
 *
 * Create a threaded comment.
 */
class CreateThreadedComment extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/comment/{$this->commentId}/reply";
	}


	/**
	 * @param float|int $commentId
	 * @param string $commentText
	 * @param null|int $assignee
	 * @param null|string $groupAssignee
	 * @param bool $notifyAll If `notify_all` is true, notifications will be sent to everyone including the creator of the comment.
	 */
	public function __construct(
		protected float|int $commentId,
		protected string $commentText,
		protected ?int $assignee = null,
		protected ?string $groupAssignee = null,
		protected bool $notifyAll,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'comment_text' => $this->commentText,
			'assignee' => $this->assignee,
			'group_assignee' => $this->groupAssignee,
			'notify_all' => $this->notifyAll,
		]);
	}
}
