<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Guests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * AddGuestToFolder.
 *
 * Share a Folder with a guest. \
 *  \
 * ***Note:** This endpoint is only available to Workspaces on our
 * [Enterprise Plan](https://clickup.com/pricing).*
 */
class AddGuestToFolder extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param string    $permissionLevel can be `read` (view only), `comment`, `edit`, or `create` (full)
     * @param bool|null $includeShared   Exclude details of items shared with the guest by setting this parameter to `false`. By default this parameter is set to `true`.
     */
    public function __construct(
        protected float|int $folderId,
        protected float|int $guestId,
        protected string $permissionLevel,
        protected ?bool $includeShared = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/folder/{$this->folderId}/guest/{$this->guestId}";
    }

    public function defaultBody(): array
    {
        return ['permission_level' => $this->permissionLevel];
    }

    protected function defaultQuery(): array
    {
        return array_filter(['include_shared' => $this->includeShared], fn (mixed $value): bool => ! is_null($value));
    }
}
