<?php

namespace ClickUp\V2\Requests\AuditLogs;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateWorkspaceAuditLog
 *
 * Create Workspace-level audit logs. Audit logs can only be created by the Workspace owner on
 * Enterprise Plans.
 */
class CreateWorkspaceAuditLog extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/auditlogs";
	}


	/**
	 * @param string $workspaceId The ID of the Workspace.
	 */
	public function __construct(
		protected string $workspaceId,
	) {
	}
}
