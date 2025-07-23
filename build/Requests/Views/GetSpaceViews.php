<?php

namespace ClickUp\V2\Requests\Views;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetSpaceViews
 *
 * View the task and page views available for a Space.
 */
class GetSpaceViews extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/space/{$this->spaceId}/view";
	}


	/**
	 * @param float|int $spaceId
	 */
	public function __construct(
		protected float|int $spaceId,
	) {
	}
}
