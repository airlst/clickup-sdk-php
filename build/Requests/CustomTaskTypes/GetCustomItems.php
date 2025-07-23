<?php

namespace ClickUp\V2\Requests\CustomTaskTypes;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetCustomItems
 *
 * View the custom task types available in a Workspace.
 */
class GetCustomItems extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/custom_item";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function __construct(
		protected float|int $teamId,
	) {
	}
}
