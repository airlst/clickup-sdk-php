<?php

namespace ClickUp\V2\Requests\Docs;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createPage
 *
 * Create a page in a Doc.
 */
class CreatePage extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/docs/{$this->docId}/pages";
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
