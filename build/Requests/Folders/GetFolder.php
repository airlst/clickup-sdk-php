<?php

namespace ClickUp\V2\Requests\Folders;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetFolder
 *
 * View the Lists within a Folder.
 */
class GetFolder extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/folder/{$this->folderId}";
	}


	/**
	 * @param float|int $folderId
	 */
	public function __construct(
		protected float|int $folderId,
	) {
	}
}
