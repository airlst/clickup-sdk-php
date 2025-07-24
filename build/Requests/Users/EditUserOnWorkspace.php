<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * EditUserOnWorkspace.
 *
 * Update a user's name and role. \
 *  \
 * ***Note:** This endpoint is only available to Workspaces on our
 * [Enterprise Plan](https://clickup.com/pricing).*
 */
class EditUserOnWorkspace extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param float|int $teamId Workspace ID
     */
    public function __construct(
        protected float|int $teamId,
        protected float|int $userId,
        protected string $username,
        protected bool $admin,
        protected int $customRoleId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/user/{$this->userId}";
    }

    public function defaultBody(): array
    {
        return ['username' => $this->username, 'admin' => $this->admin, 'custom_role_id' => $this->customRoleId];
    }
}
