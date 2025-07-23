<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\UserGroups\CreateUserGroup;
use ClickUp\V2\Requests\UserGroups\DeleteTeam;
use ClickUp\V2\Requests\UserGroups\GetTeams1;
use ClickUp\V2\Requests\UserGroups\UpdateTeam;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class UserGroups extends Resource
{
	/**
	 * @param float|int $teamId Workspace ID
	 * @param string $name
	 * @param string $handle
	 * @param array $members
	 */
	public function createUserGroup(float|int $teamId, string $name, ?string $handle = null, array $members): Response
	{
		return $this->connector->send(new CreateUserGroup($teamId, $name, $handle, $members));
	}


	/**
	 * @param string $groupId User Group ID
	 * @param string $name
	 * @param string $handle
	 * @param array $members
	 */
	public function updateTeam(
		string $groupId,
		?string $name = null,
		?string $handle = null,
		?array $members = null,
	): Response
	{
		return $this->connector->send(new UpdateTeam($groupId, $name, $handle, $members));
	}


	/**
	 * @param string $groupId User Group ID
	 */
	public function deleteTeam(string $groupId): Response
	{
		return $this->connector->send(new DeleteTeam($groupId));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param string $groupIds Enter one or more User Group IDs to retrieve information about specific User Group.
	 */
	public function getTeams1(float|int $teamId, ?string $groupIds = null): Response
	{
		return $this->connector->send(new GetTeams1($teamId, $groupIds));
	}
}
