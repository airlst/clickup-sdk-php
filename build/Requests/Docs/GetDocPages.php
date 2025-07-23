<?php

namespace ClickUp\V2\Requests\Docs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getDocPages
 *
 * View pages belonging to a Doc.
 */
class GetDocPages extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/docs/{$this->docId}/pages";
	}


	/**
	 * @param float|int $workspaceId The ID of the Workspace.
	 * @param string $docId The ID of the Doc.
	 * @param null|float|int $maxPageDepth The maximum depth to retrieve pages and subpages. A value less than 0 does not limit the depth.
	 * @param null|string $contentFormat The format to return the page content in. For example, `text/md` for markdown or `text/plain` for plain.
	 */
	public function __construct(
		protected float|int $workspaceId,
		protected string $docId,
		protected float|int|null $maxPageDepth = null,
		protected ?string $contentFormat = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['max_page_depth' => $this->maxPageDepth, 'content_format' => $this->contentFormat]);
	}
}
