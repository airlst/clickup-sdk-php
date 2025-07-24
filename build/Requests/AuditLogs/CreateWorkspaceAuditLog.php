<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\AuditLogs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * CreateWorkspaceAuditLog.
 *
 * Create Workspace-level audit logs. Audit logs can only be created by the Workspace owner on
 * Enterprise Plans.
 */
class CreateWorkspaceAuditLog extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param string     $workspaceId   the ID of the Workspace
     * @param string     $applicability Type of logs to filter by. Options include `auth-and-security` and `user-activity`. Most use cases will use `auth-and-security`.
     * @param mixed|null $filter        a filter containing the criteria to filter logs by
     * @param mixed|null $pagination    the pagination request determines where logs should start and how many to return
     */
    public function __construct(
        protected string $workspaceId,
        protected string $applicability,
        protected mixed $filter = null,
        protected mixed $pagination = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/auditlogs";
    }

    public function defaultBody(): array
    {
        return array_filter(['applicability' => $this->applicability, 'filter' => $this->filter, 'pagination' => $this->pagination], fn (mixed $value): bool => ! is_null($value));
    }
}
