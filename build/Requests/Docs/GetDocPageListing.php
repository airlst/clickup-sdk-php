<?php

namespace ClickUp\V2\Requests\Docs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getDocPageListing
 *
 * View the PageListing for a Doc.
 */
class GetDocPageListing extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/docs/{$this->docId}/pageListing";
	}


	/**
	 * @param float|int $workspaceId The ID of the Workspace.
	 * @param string $docId The ID of the Doc.
	 * @param null|float|int $maxPageDepth The maximum depth to retrieve pages and subpages. A value less than 0 does not limit the depth.
	 */
	public function __construct(
		protected float|int $workspaceId,
		protected string $docId,
		protected float|int|null $maxPageDepth = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['max_page_depth' => $this->maxPageDepth]);
	}
}
