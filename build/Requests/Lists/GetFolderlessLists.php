<?php

namespace ClickUp\V2\Requests\Lists;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetFolderlessLists
 *
 * View the Lists in a Space that aren't located in a Folder.
 */
class GetFolderlessLists extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/space/{$this->spaceId}/list";
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
