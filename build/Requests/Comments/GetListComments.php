<?php

namespace ClickUp\V2\Requests\Comments;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetListComments
 *
 * View the comments added to a List. \
 *  \
 * If you do not include the `start` and `start_id` parameters,
 * this endpoint will return the most recent 25 comments.\
 *  \
 * Use the `start` and `start id` parameters
 * of the oldest comment to retrieve the next 25 comments.
 */
class GetListComments extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/list/{$this->listId}/comment";
	}


	/**
	 * @param float|int $listId
	 * @param null|int $start Enter the `date` of a List info comment using Unix time in milliseconds.
	 * @param null|string $startId Enter the Comment `id` of a List info comment.
	 */
	public function __construct(
		protected float|int $listId,
		protected ?int $start = null,
		protected ?string $startId = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['start' => $this->start, 'start_id' => $this->startId]);
	}
}
