<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Views;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetView.
 *
 * View information about a specific task or page view.
 */
class GetView extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $viewId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/view/{$this->viewId}";
    }
}
