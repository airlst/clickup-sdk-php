<?php

namespace ClickUp\V2\Requests\Spaces;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateSpace
 *
 * Rename, set the Space color, and enable ClickApps for a Space.
 */
class UpdateSpace extends Request
{
	protected Method $method = Method::PUT;


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
