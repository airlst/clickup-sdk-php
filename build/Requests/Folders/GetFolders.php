<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Folders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetFolders.
 *
 * View the Folders in a Space.
 */
class GetFolders extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected float|int $spaceId,
        protected ?bool $archived = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/space/{$this->spaceId}/folder";
    }

    protected function defaultQuery(): array
    {
        return array_filter(['archived' => $this->archived]);
    }
}
