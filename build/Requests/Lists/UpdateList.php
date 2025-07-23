<?php

namespace ClickUp\V2\Requests\Lists;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateList
 *
 * Rename a List, update the List Info description, set a due date/time, set the List's priority, set
 * an assignee, set or remove the List color.
 */
class UpdateList extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/v2/list/{$this->listId}";
	}


	/**
	 * @param string $listId
	 */
	public function __construct(
		protected string $listId,
	) {
	}
}
