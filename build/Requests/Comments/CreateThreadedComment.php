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
	 */
	public function __construct(
		protected float|int $commentId,
	) {
	}
}
