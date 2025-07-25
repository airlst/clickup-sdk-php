<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Guests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetGuest.
 *
 * View information about a guest. \
 *  \
 * ***Note:** This endpoint is only available to Workspaces on our
 * [Enterprise Plan](https://clickup.com/pricing).*
 */
class GetGuest extends Request
{
    protected Method $method = Method::GET;

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
