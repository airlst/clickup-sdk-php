<?php

namespace ClickUp\V2\Requests\CustomFields;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAccessibleCustomFields
 *
 * View the Custom Fields you have access to in a specific List.
 */
class GetAccessibleCustomFields extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/list/{$this->listId}/field";
	}


	/**
	 * @param float|int $listId
	 */
	public function __construct(
		protected float|int $listId,
	) {
	}
}
