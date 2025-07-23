<?php

namespace ClickUp\V2\Requests\Guests;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetGuest
 *
 * View information about a guest. \
 *  \
 * ***Note:** This endpoint is only available to Workspaces on our
 * [Enterprise Plan](https://clickup.com/pricing).*
 */
class GetGuest extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/guest/{$this->guestId}";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param float|int $guestId
	 */
	public function __construct(
		protected float|int $teamId,
		protected float|int $guestId,
	) {
	}
}
