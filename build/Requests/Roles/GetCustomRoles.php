<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Roles;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * GetCustomRoles.
 *
 * View the Custom Roles available in a Workspace.
 */
class GetCustomRoles extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param float|int $teamId Workspace ID
     */
    public function __construct(
        protected float|int $teamId,
        protected ?bool $includeMembers = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/customroles";
    }

    protected function defaultQuery(): array
    {
        return array_filter(['include_members' => $this->includeMembers], fn (mixed $value): bool => ! is_null($value));
    }
}
