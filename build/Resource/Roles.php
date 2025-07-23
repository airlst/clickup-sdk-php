<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Roles\GetCustomRoles;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Roles extends Resource
{
	/**
	 * @param float|int $teamId Workspace ID
	 * @param bool $includeMembers
	 */
	public function getCustomRoles(float|int $teamId, ?bool $includeMembers = null): Response
	{
		return $this->connector->send(new GetCustomRoles($teamId, $includeMembers));
	}
}
