<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Tasks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateTaskFromTemplate.
 *
 * Create a new task using a task template defined in your workspace. Publicly shared templates must be
 * [added to your
 * Workspace](https://help.clickup.com/hc/en-us/articles/6326023965591-Add-a-template-to-your-library)
 * before you can use them with the public API.
 */
class CreateTaskFromTemplate extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected float|int $listId,
        protected string $templateId,
        protected string $name,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/list/{$this->listId}/taskTemplate/{$this->templateId}";
    }

    public function defaultBody(): array
    {
        return ['name' => $this->name];
    }
}
