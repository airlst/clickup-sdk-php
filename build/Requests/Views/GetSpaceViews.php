<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Views;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetSpaceViews.
 *
 * View the task and page views available for a Space.
 */
class GetSpaceViews extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected float|int $spaceId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/space/{$this->spaceId}/view";
    }
}
