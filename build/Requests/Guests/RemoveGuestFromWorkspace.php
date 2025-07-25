<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Guests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * RemoveGuestFromWorkspace.
 *
 * Revoke a guest's access to a Workspace. \
 *  \
 * ***Note:** This endpoint is only available to
 * Workspaces on our [Enterprise Plan](https://clickup.com/pricing).*
 */
class RemoveGuestFromWorkspace extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param float|int $teamId Workspace ID
     */
    public function __construct(
        protected float|int $teamId,
        protected float|int $guestId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/guest/{$this->guestId}";
    }
}
