<?php

namespace ClickUp\V2\Requests\Lists;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetLists
 *
 * View the Lists within a Folder.
 */
class GetLists extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/folder/{$this->folderId}/list";
	}


	/**
	 * @param float|int $folderId
	 * @param null|bool $archived
	 */
	public function __construct(
		protected float|int $folderId,
		protected ?bool $archived = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['archived' => $this->archived]);
	}
}
