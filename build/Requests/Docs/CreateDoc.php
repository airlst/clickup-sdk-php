<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Docs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * createDoc.
 *
 * Create a new Doc.
 */
class CreateDoc extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param float|int   $workspaceId the ID of the Workspace
     * @param string|null $name        the name of the new Doc
     * @param mixed|null  $parent      the parent of the new Doc
     * @param string|null $visibility  The visibility of the new Doc. For example, `PUBLIC` or `PRIVATE`.
     * @param bool|null   $createPage  create a new page when creating the Doc
     */
    public function __construct(
        protected float|int $workspaceId,
        protected ?string $name = null,
        protected mixed $parent = null,
        protected ?string $visibility = null,
        protected ?bool $createPage = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/docs";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'parent' => $this->parent,
            'visibility' => $this->visibility,
            'create_page' => $this->createPage,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
