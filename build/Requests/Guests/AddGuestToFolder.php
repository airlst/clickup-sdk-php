<?php

namespace ClickUp\V2\Requests\Guests;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * AddGuestToFolder
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


	public function resolveEndpoint(): string
	{
		return "/v2/folder/{$this->folderId}/guest/{$this->guestId}";
	}


	/**
	 * @param float|int $folderId
	 * @param float|int $guestId
	 * @param null|bool $includeShared Exclude details of items shared with the guest by setting this parameter to `false`. By default this parameter is set to `true`.
	 */
	public function __construct(
		protected float|int $folderId,
		protected float|int $guestId,
		protected ?bool $includeShared = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['include_shared' => $this->includeShared]);
	}
}
