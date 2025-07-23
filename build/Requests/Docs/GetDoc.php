<?php

namespace ClickUp\V2\Requests\Docs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getDoc
 *
 * View information about a Doc.
 */
class GetDoc extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/docs/{$this->docId}";
	}


	/**
	 * @param float|int $workspaceId The ID of the Workspace.
	 * @param string $docId The ID of the Doc.
	 */
	public function __construct(
		protected float|int $workspaceId,
		protected string $docId,
	) {
	}
}
