<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Goals;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * EditKeyResult.
 *
 * Update a Target.
 */
class EditKeyResult extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param string $keyResultId 8480-49bc-8c57-e569747efe93 (uuid)
     */
    public function __construct(
        protected string $keyResultId,
        protected int $stepsCurrent,
        protected string $note,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/key_result/{$this->keyResultId}";
    }

    public function defaultBody(): array
    {
        return array_filter(['steps_current' => $this->stepsCurrent, 'note' => $this->note]);
    }
}
