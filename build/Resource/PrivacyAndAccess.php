<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\PrivacyAndAccess\UpdatePrivacyAndAccess;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class PrivacyAndAccess extends Resource
{
	/**
	 * @param string $workspaceId The ID of the Workspace.
	 * @param string $objectType Any object that can be shared in a Workspace. For example, `customField`, `dashboard`, `folder`, `goal`, `goalFolder`,`list`, `space`, `task`, and `view`.
	 * @param string $objectId The ID of the object to share.
	 */
	public function updatePrivacyAndAccess(string $workspaceId, string $objectType, string $objectId): Response
	{
		return $this->connector->send(new UpdatePrivacyAndAccess($workspaceId, $objectType, $objectId));
	}
}
