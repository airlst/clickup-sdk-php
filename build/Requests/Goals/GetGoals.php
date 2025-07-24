<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Goals;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * GetGoals.
 *
 * View the Goals available in a Workspace.
 */
class GetGoals extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param float|int $teamId Workspace ID
     */
    public function __construct(
        protected float|int $teamId,
        protected ?bool $includeCompleted = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/goal";
    }

    protected function defaultQuery(): array
    {
        return array_filter(['include_completed' => $this->includeCompleted], fn (mixed $value): bool => ! is_null($value));
    }
}
