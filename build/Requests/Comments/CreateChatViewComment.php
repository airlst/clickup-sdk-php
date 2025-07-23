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
	 */
	public function __construct(
		protected string $viewId,
	) {
	}
}
