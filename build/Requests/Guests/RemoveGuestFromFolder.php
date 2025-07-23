<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Guests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * RemoveGuestFromFolder.
 *
 * Revoke a guest's access to a Folder. \
 *  \
 * ***Note:** This endpoint is only available to Workspaces
 * on our [Enterprise Plan](https://clickup.com/pricing).*
 */
class RemoveGuestFromFolder extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param bool|null $includeShared Exclude details of items shared with the guest by setting this parameter to `false`. By default this parameter is set to `true`.
     */
    public function __construct(
        protected float|int $folderId,
        protected float|int $guestId,
        protected ?bool $includeShared = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/folder/{$this->folderId}/guest/{$this->guestId}";
    }

    protected function defaultQuery(): array
    {
        return array_filter(['include_shared' => $this->includeShared]);
    }
}
