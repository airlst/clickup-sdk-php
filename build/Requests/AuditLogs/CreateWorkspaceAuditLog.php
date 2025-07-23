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
	 * @param null|mixed $filter A filter containing the criteria to filter logs by.
	 * @param string $applicability Type of logs to filter by. Options include `auth-and-security` and `user-activity`. Most use cases will use `auth-and-security`.
	 * @param null|mixed $pagination The pagination request determines where logs should start and how many to return.
	 */
	public function __construct(
		protected string $workspaceId,
		protected mixed $filter = null,
		protected string $applicability,
		protected mixed $pagination = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['filter' => $this->filter, 'applicability' => $this->applicability, 'pagination' => $this->pagination]);
	}
}
