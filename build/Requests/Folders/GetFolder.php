<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Folders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetFolder.
 *
 * View the Lists within a Folder.
 */
class GetFolder extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected float|int $folderId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/folder/{$this->folderId}";
    }
}
