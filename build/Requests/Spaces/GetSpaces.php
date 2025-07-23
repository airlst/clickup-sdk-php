<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Spaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetSpaces.
 *
 * View the Spaces avialable in a Workspace. You can only get member info in private Spaces.
 */
class GetSpaces extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param float|int $teamId Workspace ID
     */
    public function __construct(
        protected float|int $teamId,
        protected ?bool $archived = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/space";
    }

    protected function defaultQuery(): array
    {
        return array_filter(['archived' => $this->archived]);
    }
}
