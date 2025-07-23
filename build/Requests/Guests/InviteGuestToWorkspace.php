<?php

namespace ClickUp\V2\Requests\Guests;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * InviteGuestToWorkspace
 *
 * Invite a guest to join a Workspace. To invite a member to your Workspace, use the [Invite User to
 * Workspace](ref:inviteusertoworkspace) endpoint. \
 *  \
 * You'll also need to grant the guest access to
 * specific items using the following endpoints: [Add Guest to Folder](ref:addguesttofolder), [Add
 * Guest to List](ref:addguesttolist), or [Add Guest to Task](ref:addguesttotask). \
 *  \
 * ***Note:** This
 * endpoint is only available to Workspaces on our [Enterprise Plan](https://clickup.com/pricing).*
 */
class InviteGuestToWorkspace extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/guest";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function __construct(
		protected float|int $teamId,
	) {
	}
}
