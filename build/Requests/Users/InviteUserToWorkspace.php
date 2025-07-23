<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Users;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * InviteUserToWorkspace.
 *
 * Invite someone to join your Workspace as a member. To invite someone as a guest, use the [Invite
 * Guest](ref:inviteguesttoworkspace) endpoint.\
 *  \
 * ***Note:** This endpoint is only available to
 * Workspaces on our [Enterprise Plan](https://clickup.com/pricing).*
 */
class InviteUserToWorkspace extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param float|int $teamId Workspace ID
     */
    public function __construct(
        protected float|int $teamId,
        protected string $email,
        protected bool $admin,
        protected ?int $customRoleId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/user";
    }

    public function defaultBody(): array
    {
        return array_filter(['email' => $this->email, 'admin' => $this->admin, 'custom_role_id' => $this->customRoleId]);
    }
}
