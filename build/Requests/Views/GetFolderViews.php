<?php

namespace ClickUp\V2\Requests\Views;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetFolderViews
 *
 * View the task and page views available for a Folder.
 */
class GetFolderViews extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/folder/{$this->folderId}/view";
	}


	/**
	 * @param float|int $folderId
	 */
	public function __construct(
		protected float|int $folderId,
	) {
	}
}
