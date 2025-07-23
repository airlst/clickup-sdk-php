<?php

namespace ClickUp\V2\Requests\Roles;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetCustomRoles
 *
 * View the Custom Roles available in a Workspace.
 */
class GetCustomRoles extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/customroles";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param null|bool $includeMembers
	 */
	public function __construct(
		protected float|int $teamId,
		protected ?bool $includeMembers = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['include_members' => $this->includeMembers]);
	}
}
