<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Views;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetViewTasks.
 *
 * See all visible tasks in a view in ClickUp.
 */
class GetViewTasks extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param string $viewId 105 (string)
     */
    public function __construct(
        protected string $viewId,
        protected int $page,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/view/{$this->viewId}/task";
    }

    protected function defaultQuery(): array
    {
        return ['page' => $this->page];
    }
}
