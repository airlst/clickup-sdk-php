<?php

namespace ClickUp\V2\Requests\CustomFields;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getSpaceAvailableFields
 *
 * View the Custom Fields you have access to in a specific Space. Get Space Custom Fields only returns
 * Custom Fields created at the Space level. Custom Fields created at the Folder and List level are not
 * included.
 */
class GetSpaceAvailableFields extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/space/{$this->spaceId}/field";
	}


	/**
	 * @param float|int $spaceId
	 */
	public function __construct(
		protected float|int $spaceId,
	) {
	}
}
