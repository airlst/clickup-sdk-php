<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Users\EditUserOnWorkspace;
use ClickUp\V2\Requests\Users\GetUser;
use ClickUp\V2\Requests\Users\InviteUserToWorkspace;
use ClickUp\V2\Requests\Users\RemoveUserFromWorkspace;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Users extends Resource
{
	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function inviteUserToWorkspace(float|int $teamId): Response
	{
		return $this->connector->send(new InviteUserToWorkspace($teamId));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param float|int $userId
	 * @param bool $includeShared Exclude details of items shared with the guest by setting this parameter to `false`. By default this parameter is set to `true`.
	 */
	public function getUser(float|int $teamId, float|int $userId, ?bool $includeShared = null): Response
	{
		return $this->connector->send(new GetUser($teamId, $userId, $includeShared));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param float|int $userId
	 */
	public function editUserOnWorkspace(float|int $teamId, float|int $userId): Response
	{
		return $this->connector->send(new EditUserOnWorkspace($teamId, $userId));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param float|int $userId
	 */
	public function removeUserFromWorkspace(float|int $teamId, float|int $userId): Response
	{
		return $this->connector->send(new RemoveUserFromWorkspace($teamId, $userId));
	}
}
