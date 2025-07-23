<?php

namespace ClickUp\V2\Requests\Docs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * editPage
 *
 * Edit a page in a Doc.
 */
class EditPage extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/docs/{$this->docId}/pages/{$this->pageId}";
	}


	/**
	 * @param float|int $workspaceId The ID of the Workspace.
	 * @param string $docId The ID of the Doc.
	 * @param string $pageId The ID of the page.
	 */
	public function __construct(
		protected float|int $workspaceId,
		protected string $docId,
		protected string $pageId,
	) {
	}
}
