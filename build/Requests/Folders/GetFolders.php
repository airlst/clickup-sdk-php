<?php

namespace ClickUp\V2\Requests\Folders;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetFolders
 *
 * View the Folders in a Space.
 */
class GetFolders extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/space/{$this->spaceId}/folder";
	}


	/**
	 * @param float|int $spaceId
	 * @param null|bool $archived
	 */
	public function __construct(
		protected float|int $spaceId,
		protected ?bool $archived = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['archived' => $this->archived]);
	}
}
