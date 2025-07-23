<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Views;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetTeamViews.
 *
 * View the task and page views available at the Everything Level of a Workspace.
 */
class GetTeamViews extends Request
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
        return "/v2/team/{$this->teamId}/view";
    }
}
