<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\AuditLogs\CreateWorkspaceAuditLog;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class AuditLogs extends Resource
{
	/**
	 * @param string $workspaceId The ID of the Workspace.
	 * @param mixed $filter A filter containing the criteria to filter logs by.
	 * @param string $applicability Type of logs to filter by. Options include `auth-and-security` and `user-activity`. Most use cases will use `auth-and-security`.
	 * @param mixed $pagination The pagination request determines where logs should start and how many to return.
	 */
	public function createWorkspaceAuditLog(
		string $workspaceId,
		mixed $filter = null,
		string $applicability,
		mixed $pagination = null,
	): Response
	{
		return $this->connector->send(new CreateWorkspaceAuditLog($workspaceId, $filter, $applicability, $pagination));
	}
}
