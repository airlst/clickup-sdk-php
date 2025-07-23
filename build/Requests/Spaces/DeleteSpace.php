<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Spaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteSpace.
 *
 * Delete a Space from your Workspace.
 */
class DeleteSpace extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected float|int $spaceId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/space/{$this->spaceId}";
    }
}
