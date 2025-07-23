<?php

namespace ClickUp\V2\Requests\Comments;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetThreadedComments
 *
 * View threaded comments. The parent comment is not included.
 */
class GetThreadedComments extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/comment/{$this->commentId}/reply";
	}


	/**
	 * @param float|int $commentId
	 */
	public function __construct(
		protected float|int $commentId,
	) {
	}
}
