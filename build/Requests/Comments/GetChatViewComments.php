<?php

namespace ClickUp\V2\Requests\Comments;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetChatViewComments
 *
 * View comments from a Chat view. \
 *  \
 * If you do not include the `start` and `start_id` parameters,
 * this endpoint will return the most recent 25 comments.\
 *  \
 * Use the `start` and `start id` parameters
 * of the oldest comment to retrieve the next 25 comments.
 */
class GetChatViewComments extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/view/{$this->viewId}/comment";
	}


	/**
	 * @param string $viewId 105 (string)
	 * @param null|int $start Enter the `date` of a Chat view comment using Unix time in milliseconds.
	 * @param null|string $startId Enter the Comment `id` of a Chat view comment.
	 */
	public function __construct(
		protected string $viewId,
		protected ?int $start = null,
		protected ?string $startId = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['start' => $this->start, 'start_id' => $this->startId]);
	}
}
