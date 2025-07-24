<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Folders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateFolder.
 *
 * Rename a Folder.
 */
class UpdateFolder extends Request
{
    protected Method $method = Method::PUT;

    public function __construct(
        protected float|int $folderId,
        protected string $name,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/folder/{$this->folderId}";
    }

    public function defaultBody(): array
    {
        return ['name' => $this->name];
    }
}
