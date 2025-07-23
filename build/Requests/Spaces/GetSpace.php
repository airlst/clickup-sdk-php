<?php

namespace ClickUp\V2\Requests\Spaces;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetSpace
 *
 * View the Spaces available in a Workspace.
 */
class GetSpace extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/space/{$this->spaceId}";
	}


	/**
	 * @param float|int $spaceId
	 */
	public function __construct(
		protected float|int $spaceId,
	) {
	}
}
