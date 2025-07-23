<?php

namespace ClickUp\V2\Requests\Users;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * RemoveUserFromWorkspace
 *
 * Deactivate a user from a Workspace. \
 *  \
 * ***Note:** This endpoint is only available to Workspaces on
 * our [Enterprise Plan](https://clickup.com/pricing).*
 */
class RemoveUserFromWorkspace extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/user/{$this->userId}";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param float|int $userId
	 */
	public function __construct(
		protected float|int $teamId,
		protected float|int $userId,
	) {
	}
}
