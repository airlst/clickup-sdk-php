<?php

namespace ClickUp\V2\Requests\Authorization;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAuthorizedTeams
 *
 * View the Workspaces available to the authenticated user.
 */
class GetAuthorizedTeams extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/team";
	}


	public function __construct()
	{
	}
}
