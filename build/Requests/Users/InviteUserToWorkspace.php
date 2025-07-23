<?php

namespace ClickUp\V2\Requests\Users;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * InviteUserToWorkspace
 *
 * Invite someone to join your Workspace as a member. To invite someone as a guest, use the [Invite
 * Guest](ref:inviteguesttoworkspace) endpoint.\
 *  \
 * ***Note:** This endpoint is only available to
 * Workspaces on our [Enterprise Plan](https://clickup.com/pricing).*
 */
class InviteUserToWorkspace extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/user";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function __construct(
		protected float|int $teamId,
	) {
	}
}
