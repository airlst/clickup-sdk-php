<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Docs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getDocPageListing.
 *
 * View the PageListing for a Doc.
 */
class GetDocPageListing extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param float|int      $workspaceId  the ID of the Workspace
     * @param string         $docId        the ID of the Doc
     * @param float|int|null $maxPageDepth The maximum depth to retrieve pages and subpages. A value less than 0 does not limit the depth.
     */
    public function __construct(
        protected float|int $workspaceId,
        protected string $docId,
        protected float|int|null $maxPageDepth = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/docs/{$this->docId}/pageListing";
    }

    protected function defaultQuery(): array
    {
        return array_filter(['max_page_depth' => $this->maxPageDepth]);
    }
}
