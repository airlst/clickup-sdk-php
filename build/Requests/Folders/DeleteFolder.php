<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Folders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteFolder.
 *
 * Delete a Folder from your Workspace.
 */
class DeleteFolder extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected float|int $folderId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/folder/{$this->folderId}";
    }
}
