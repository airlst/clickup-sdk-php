<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Folders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * CreateFolderFromTemplate.
 *
 * Create a new Folder using a Folder template within a Space. This endpoint allows you to create a
 * folder with all its nested assets (lists, tasks, etc.) from a predefined template available in your
 * Workspace. Publicly shared templates must be [added to your
 * Workspace](https://help.clickup.com/hc/en-us/articles/6326023965591-Add-a-template-to-your-library)
 * before you can use them with the public API.
 * This request can be run asynchronously or synchronously
 * via the `return_immediately` parameter.
 */
class CreateFolderFromTemplate extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param string     $spaceId    ID of the Space where the Folder will be created
     * @param string     $templateId ID of the Folder template to use
     * @param string     $name       Name of the new Folder
     * @param array|null $options    Options for creating the Folder
     */
    public function __construct(
        protected string $spaceId,
        protected string $templateId,
        protected string $name,
        protected ?array $options = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/space/{$this->spaceId}/folder_template/{$this->templateId}";
    }

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name, 'options' => $this->options], fn (mixed $value): bool => ! is_null($value));
    }
}
