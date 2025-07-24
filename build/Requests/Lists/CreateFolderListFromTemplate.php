<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Lists;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * CreateFolderListFromTemplate.
 *
 * Create a new list using a list template in a Folder.
 * This request runs synchronously by default with
 * `return_immediately=true`.
 * The request returns the future List ID immediatly, but the List may not
 * be created when the response is sent.
 * Small templates can be applied synchronously, which guarantees
 * that all sub objects are created.
 * In case of a timeout on synchronous requests, the objects from the
 * template will continue to be created past the timeout.
 */
class CreateFolderListFromTemplate extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param string     $folderId   ID of the Folder where the List will be created
     * @param string     $templateId ID of the template to use
     * @param string     $name       Name of the new List
     * @param array|null $options    Options for creating the List
     */
    public function __construct(
        protected string $folderId,
        protected string $templateId,
        protected string $name,
        protected ?array $options = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/folder/{$this->folderId}/list_template/{$this->templateId}";
    }

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name, 'options' => $this->options], fn (mixed $value): bool => ! is_null($value));
    }
}
