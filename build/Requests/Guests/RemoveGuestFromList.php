<?php

namespace ClickUp\V2\Requests\Guests;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * RemoveGuestFromList
 *
 * Revoke a guest's access to a List.\
 *  \
 * ***Note:** This endpoint is only available to Workspaces on
 * our [Enterprise Plan](https://clickup.com/pricing).*
 */
class RemoveGuestFromList extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v2/list/{$this->listId}/guest/{$this->guestId}";
	}


	/**
	 * @param float|int $listId
	 * @param float|int $guestId
	 * @param null|bool $includeShared Exclude details of items shared with the guest by setting this parameter to `false`. By default this parameter is set to `true`.
	 */
	public function __construct(
		protected float|int $listId,
		protected float|int $guestId,
		protected ?bool $includeShared = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['include_shared' => $this->includeShared]);
	}
}
