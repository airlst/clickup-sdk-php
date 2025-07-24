<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Templates;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetTaskTemplates.
 *
 * View the task templates available in a Workspace.
 */
class GetTaskTemplates extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param float|int $teamId Workspace ID
     */
    public function __construct(
        protected float|int $teamId,
        protected int $page,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/taskTemplate";
    }

    protected function defaultQuery(): array
    {
        return ['page' => $this->page];
    }
}
