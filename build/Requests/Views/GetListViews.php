<?php

namespace ClickUp\V2\Requests\Views;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetListViews
 *
 * View the task and page views available for a List.<br> Views and required views are separate
 * responses.
 */
class GetListViews extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/list/{$this->listId}/view";
	}


	/**
	 * @param float|int $listId
	 */
	public function __construct(
		protected float|int $listId,
	) {
	}
}
