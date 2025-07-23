<?php

namespace ClickUp\V2\Requests\Users;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * EditUserOnWorkspace
 *
 * Update a user's name and role. \
 *  \
 * ***Note:** This endpoint is only available to Workspaces on our
 * [Enterprise Plan](https://clickup.com/pricing).*
 */
class EditUserOnWorkspace extends Request
{
	protected Method $method = Method::PUT;


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
