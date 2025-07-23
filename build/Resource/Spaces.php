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
	 */
	public function createSpace(float|int $teamId): Response
	{
		return $this->connector->send(new CreateSpace($teamId));
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
	 */
	public function updateSpace(float|int $spaceId): Response
	{
		return $this->connector->send(new UpdateSpace($spaceId));
	}


	/**
	 * @param float|int $spaceId
	 */
	public function deleteSpace(float|int $spaceId): Response
	{
		return $this->connector->send(new DeleteSpace($spaceId));
	}
}
