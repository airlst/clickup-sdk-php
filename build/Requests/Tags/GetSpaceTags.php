<?php

namespace ClickUp\V2\Requests\Tags;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetSpaceTags
 *
 * View the task Tags available in a Space.
 */
class GetSpaceTags extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/space/{$this->spaceId}/tag";
	}


	/**
	 * @param float|int $spaceId
	 */
	public function __construct(
		protected float|int $spaceId,
	) {
	}
}
