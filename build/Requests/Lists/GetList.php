<?php

namespace ClickUp\V2\Requests\Lists;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetList
 *
 * View information about a List.
 */
class GetList extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/list/{$this->listId}";
	}


	/**
	 * @param float|int $listId The List ID. To find the List ID, right-click the List in your Sidebar, select Copy link, and paste the link in your URL. The last string in the URL is your List ID.
	 */
	public function __construct(
		protected float|int $listId,
	) {
	}
}
