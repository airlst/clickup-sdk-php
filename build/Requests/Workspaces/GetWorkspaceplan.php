<?php

namespace ClickUp\V2\Requests\Workspaces;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetWorkspaceplan
 *
 * View the current [Plan](https://clickup.com/pricing) for the specified Workspace.
 */
class GetWorkspaceplan extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/plan";
	}


	/**
	 * @param string $teamId Workspace ID
	 */
	public function __construct(
		protected string $teamId,
	) {
	}
}
