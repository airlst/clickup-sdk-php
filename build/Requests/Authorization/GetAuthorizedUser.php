<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Authorization;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAuthorizedUser.
 *
 * View the details of the authenticated user's ClickUp account.
 */
class GetAuthorizedUser extends Request
{
    protected Method $method = Method::GET;

    public function __construct() {}

    public function resolveEndpoint(): string
    {
        return '/v2/user';
    }
}
