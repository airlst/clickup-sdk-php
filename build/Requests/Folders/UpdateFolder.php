<?php

namespace ClickUp\V2\Requests\Folders;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateFolder
 *
 * Rename a Folder.
 */
class UpdateFolder extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/v2/folder/{$this->folderId}";
	}


	/**
	 * @param float|int $folderId
	 * @param string $name
	 */
	public function __construct(
		protected float|int $folderId,
		protected string $name,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['name' => $this->name]);
	}
}
