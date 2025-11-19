<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Views;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetListViews.
 *
 * View the task and page views available for a List.\
 *  \
 * Views and required views are separate
 * responses.
 */
class GetListViews extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected float|int $listId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/list/{$this->listId}/view";
    }
}
