<?php

declare(strict_types=1);

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\AuditLogs\CreateWorkspaceAuditLog;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class AuditLogs extends Resource
{
    /**
     * @param string $workspaceId   the ID of the Workspace
     * @param string $applicability Type of logs to filter by. Options include `auth-and-security` and `user-activity`. Most use cases will use `auth-and-security`.
     * @param mixed  $filter        a filter containing the criteria to filter logs by
     * @param mixed  $pagination    the pagination request determines where logs should start and how many to return
     */
    public function createWorkspaceAuditLog(
        string $workspaceId,
        string $applicability,
        mixed $filter = null,
        mixed $pagination = null,
    ): Response {
        return $this->connector->send(new CreateWorkspaceAuditLog($workspaceId, $applicability, $filter, $pagination));
    }
}
