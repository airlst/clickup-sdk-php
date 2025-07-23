<?php

namespace ClickUp\V2\Requests\CustomFields;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getTeamAvailableFields
 *
 * View the Custom Fields you have access to in a specific Workspace. Get Workspace Custom Fields only
 * returns Custom Fields created at the Workspace level. Custom Fields created at the Space, Folder,
 * and List level are not included.
 */
class GetTeamAvailableFields extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/field";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function __construct(
		protected float|int $teamId,
	) {
	}
}
