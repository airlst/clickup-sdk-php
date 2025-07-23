<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Spaces\CreateSpace;
use ClickUp\V2\Requests\Spaces\DeleteSpace;
use ClickUp\V2\Requests\Spaces\GetSpace;
use ClickUp\V2\Requests\Spaces\GetSpaces;
use ClickUp\V2\Requests\Spaces\UpdateSpace;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Spaces extends Resource
{
	/**
	 * @param float|int $teamId Workspace ID
	 * @param bool $archived
	 */
	public function getSpaces(float|int $teamId, ?bool $archived = null): Response
	{
		return $this->connector->send(new GetSpaces($teamId, $archived));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param string $name
	 * @param bool $multipleAssignees
	 * @param array $features
	 */
	public function createSpace(float|int $teamId, string $name, bool $multipleAssignees, array $features): Response
	{
		return $this->connector->send(new CreateSpace($teamId, $name, $multipleAssignees, $features));
	}


	/**
	 * @param float|int $spaceId
	 */
	public function getSpace(float|int $spaceId): Response
	{
		return $this->connector->send(new GetSpace($spaceId));
	}


	/**
	 * @param float|int $spaceId
	 * @param string $name
	 * @param string $color
	 * @param bool $private
	 * @param bool $adminCanManage ***Note:** Allowing or restricting admins from managing private Spaces using `"admin_can_manage"` is an [Enterprise Plan](https://clickup.com/pricing) feature.*
	 * @param bool $multipleAssignees
	 * @param array $features
	 */
	public function updateSpace(
		float|int $spaceId,
		string $name,
		string $color,
		bool $private,
		bool $adminCanManage,
		bool $multipleAssignees,
		array $features,
	): Response
	{
		return $this->connector->send(new UpdateSpace($spaceId, $name, $color, $private, $adminCanManage, $multipleAssignees, $features));
	}


	/**
	 * @param float|int $spaceId
	 */
	public function deleteSpace(float|int $spaceId): Response
	{
		return $this->connector->send(new DeleteSpace($spaceId));
	}
}
