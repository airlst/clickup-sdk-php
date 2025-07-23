<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Workspaces\GetWorkspaceplan;
use ClickUp\V2\Requests\Workspaces\GetWorkspaceseats;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Workspaces extends Resource
{
	/**
	 * @param string $teamId Workspace ID
	 */
	public function getWorkspaceseats(string $teamId): Response
	{
		return $this->connector->send(new GetWorkspaceseats($teamId));
	}


	/**
	 * @param string $teamId Workspace ID
	 */
	public function getWorkspaceplan(string $teamId): Response
	{
		return $this->connector->send(new GetWorkspaceplan($teamId));
	}
}
