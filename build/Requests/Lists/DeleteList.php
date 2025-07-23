<?php

namespace ClickUp\V2\Requests\Lists;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteList
 *
 * Delete a List from your Workspace.
 */
class DeleteList extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v2/list/{$this->listId}";
	}


	/**
	 * @param float|int $listId
	 */
	public function __construct(
		protected float|int $listId,
	) {
	}
}
