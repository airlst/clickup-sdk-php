<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\AuditLogs\CreateWorkspaceAuditLog;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class AuditLogs extends Resource
{
	/**
	 * @param string $workspaceId The ID of the Workspace.
	 */
	public function createWorkspaceAuditLog(string $workspaceId): Response
	{
		return $this->connector->send(new CreateWorkspaceAuditLog($workspaceId));
	}
}
