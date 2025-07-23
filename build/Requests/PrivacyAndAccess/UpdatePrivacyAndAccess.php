<?php

namespace ClickUp\V2\Requests\PrivacyAndAccess;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * UpdatePrivacyAndAccess
 *
 * Update the privacy and access settings of an object or location in the Workspace. Note that sharing
 * an item may incur charges.
 */
class UpdatePrivacyAndAccess extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/{$this->objectType}/{$this->objectId}/acls";
	}


	/**
	 * @param string $workspaceId The ID of the Workspace.
	 * @param string $objectType Any object that can be shared in a Workspace. For example, `customField`, `dashboard`, `folder`, `goal`, `goalFolder`,`list`, `space`, `task`, and `view`.
	 * @param string $objectId The ID of the object to share.
	 */
	public function __construct(
		protected string $workspaceId,
		protected string $objectType,
		protected string $objectId,
	) {
	}
}
