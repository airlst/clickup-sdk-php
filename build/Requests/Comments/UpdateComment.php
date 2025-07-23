<?php

namespace ClickUp\V2\Requests\Comments;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateComment
 *
 * Replace the content of a task commment, assign a comment, and mark a comment as resolved.
 */
class UpdateComment extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/v2/comment/{$this->commentId}";
	}


	/**
	 * @param float|int $commentId
	 * @param string $commentText
	 * @param int $assignee
	 * @param null|int $groupAssignee
	 * @param bool $resolved
	 */
	public function __construct(
		protected float|int $commentId,
		protected string $commentText,
		protected int $assignee,
		protected ?int $groupAssignee = null,
		protected bool $resolved,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'comment_text' => $this->commentText,
			'assignee' => $this->assignee,
			'group_assignee' => $this->groupAssignee,
			'resolved' => $this->resolved,
		]);
	}
}
