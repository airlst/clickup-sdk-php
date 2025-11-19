<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Workspaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAuthorizedTeams.
 *
 * View the Workspaces available to the authenticated user.
 */
class GetAuthorizedTeams extends Request
{
    protected Method $method = Method::GET;

    public function __construct() {}

    public function resolveEndpoint(): string
    {
        return '/v2/team';
    }
}
