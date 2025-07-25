<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * GetUser.
 *
 * View information about a user in a Workspace. \
 *  \
 * ***Note:** This endpoint is only available to
 * Workspaces on our [Enterprise Plan](https://clickup.com/pricing).*
 */
class GetUser extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param float|int $teamId        Workspace ID
     * @param bool|null $includeShared Exclude details of items shared with the guest by setting this parameter to `false`. By default this parameter is set to `true`.
     */
    public function __construct(
        protected float|int $teamId,
        protected float|int $userId,
        protected ?bool $includeShared = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/user/{$this->userId}";
    }

    protected function defaultQuery(): array
    {
        return array_filter(['include_shared' => $this->includeShared], fn (mixed $value): bool => ! is_null($value));
    }
}
