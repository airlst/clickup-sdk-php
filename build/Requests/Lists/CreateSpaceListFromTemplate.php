<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Lists;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateSpaceListFromTemplate.
 *
 * Create a new List using a List template within a Space.
 * This request can be run asynchronously or
 * synchronously via the `return_immediately` parameter.
 */
class CreateSpaceListFromTemplate extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param string     $spaceId    ID of the Space where the List will be created
     * @param string     $templateId ID of the template to use
     * @param string     $name       Name of the new List
     * @param array|null $options    Options for creating the List
     */
    public function __construct(
        protected string $spaceId,
        protected string $templateId,
        protected string $name,
        protected ?array $options = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/space/{$this->spaceId}/list_template/{$this->templateId}";
    }

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name, 'options' => $this->options]);
    }
}
