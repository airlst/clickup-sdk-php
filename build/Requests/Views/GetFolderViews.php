<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Views;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetFolderViews.
 *
 * View the task and page views available for a Folder.
 */
class GetFolderViews extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected float|int $folderId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/folder/{$this->folderId}/view";
    }
}
