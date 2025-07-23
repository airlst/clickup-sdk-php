<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Members;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetListMembers.
 *
 * Get Workspace members who have access to a List.
 */
class GetListMembers extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected float|int $listId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/list/{$this->listId}/member";
    }
}
