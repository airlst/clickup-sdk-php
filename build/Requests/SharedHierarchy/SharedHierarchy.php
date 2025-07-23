<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\SharedHierarchy;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * SharedHierarchy.
 *
 * View the tasks, Lists, and Folders that have been shared with the authenticated user.
 */
class SharedHierarchy extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param float|int $teamId Workspace ID
     */
    public function __construct(
        protected float|int $teamId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/shared";
    }
}
