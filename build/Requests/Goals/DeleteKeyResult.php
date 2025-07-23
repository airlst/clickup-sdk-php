<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Goals;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteKeyResult.
 *
 * Delete a target from a Goal.
 */
class DeleteKeyResult extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param string $keyResultId 8480-49bc-8c57-e569747efe93 (uuid)
     */
    public function __construct(
        protected string $keyResultId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/key_result/{$this->keyResultId}";
    }
}
