<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Docs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getDoc.
 *
 * View information about a Doc.
 */
class GetDoc extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param float|int $workspaceId the ID of the Workspace
     * @param string    $docId       the ID of the Doc
     */
    public function __construct(
        protected float|int $workspaceId,
        protected string $docId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/docs/{$this->docId}";
    }
}
