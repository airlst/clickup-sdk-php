<?php

namespace ClickUp\V2\Requests\Comments;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteComment
 *
 * Delete a task comment.
 */
class DeleteComment extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v2/comment/{$this->commentId}";
	}


	/**
	 * @param float|int $commentId
	 */
	public function __construct(
		protected float|int $commentId,
	) {
	}
}
