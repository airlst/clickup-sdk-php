<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * RemoveUserFromWorkspace.
 *
 * Deactivate a user from a Workspace. \
 *  \
 * ***Note:** This endpoint is only available to Workspaces on
 * our [Enterprise Plan](https://clickup.com/pricing).*
 */
class RemoveUserFromWorkspace extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param float|int $teamId Workspace ID
     */
    public function __construct(
        protected float|int $teamId,
        protected float|int $userId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/user/{$this->userId}";
    }
}
