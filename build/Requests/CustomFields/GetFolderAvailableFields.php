<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\CustomFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getFolderAvailableFields.
 *
 * View the Custom Fields you have access to in a specific Folder. Get Folder Custom Fields only
 * returns Custom Fields created at the Folder level. Custom Fields created at the List level are not
 * included.
 */
class GetFolderAvailableFields extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected float|int $folderId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/folder/{$this->folderId}/field";
    }
}
