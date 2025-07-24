<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Lists;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * GetLists.
 *
 * View the Lists within a Folder.
 */
class GetLists extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected float|int $folderId,
        protected ?bool $archived = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/folder/{$this->folderId}/list";
    }

    protected function defaultQuery(): array
    {
        return array_filter(['archived' => $this->archived], fn (mixed $value): bool => ! is_null($value));
    }
}
