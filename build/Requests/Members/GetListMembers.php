<?php

namespace ClickUp\V2\Requests\Members;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetListMembers
 *
 * Get Workspace members who have access to a List.
 */
class GetListMembers extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/list/{$this->listId}/member";
	}


	/**
	 * @param float|int $listId
	 */
	public function __construct(
		protected float|int $listId,
	) {
	}
}
