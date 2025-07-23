<?php

namespace ClickUp\V2\Requests\Docs;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createDoc
 *
 * Create a new Doc.
 */
class CreateDoc extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/docs";
	}


	/**
	 * @param float|int $workspaceId The ID of the Workspace.
	 */
	public function __construct(
		protected float|int $workspaceId,
	) {
	}
}
