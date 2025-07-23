<?php

namespace ClickUp\V2\Requests\Docs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getPage
 *
 * View the information about a page in a Doc. Due to markdown format limitations, some content
 * elements [will not be displayed exactly as they appear in
 * ClickUp.](doc:docsimportexportlimitations/)
 */
class GetPage extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/docs/{$this->docId}/pages/{$this->pageId}";
	}


	/**
	 * @param float|int $workspaceId The ID of the Workspace.
	 * @param string $docId The ID of the Doc.
	 * @param string $pageId The ID of the page.
	 * @param null|string $contentFormat The format to return the page content in. For example, `text/md` for markdown or `text/plain` for plain.
	 */
	public function __construct(
		protected float|int $workspaceId,
		protected string $docId,
		protected string $pageId,
		protected ?string $contentFormat = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['content_format' => $this->contentFormat]);
	}
}
