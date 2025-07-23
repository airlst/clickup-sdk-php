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
	 * @param string $email
	 * @param null|bool $canEditTags
	 * @param null|bool $canSeeTimeSpent
	 * @param null|bool $canSeeTimeEstimated
	 * @param null|bool $canCreateViews
	 * @param null|bool $canSeePointsEstimated
	 * @param null|int $customRoleId
	 */
	public function __construct(
		protected float|int $teamId,
		protected string $email,
		protected ?bool $canEditTags = null,
		protected ?bool $canSeeTimeSpent = null,
		protected ?bool $canSeeTimeEstimated = null,
		protected ?bool $canCreateViews = null,
		protected ?bool $canSeePointsEstimated = null,
		protected ?int $customRoleId = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'email' => $this->email,
			'can_edit_tags' => $this->canEditTags,
			'can_see_time_spent' => $this->canSeeTimeSpent,
			'can_see_time_estimated' => $this->canSeeTimeEstimated,
			'can_create_views' => $this->canCreateViews,
			'can_see_points_estimated' => $this->canSeePointsEstimated,
			'custom_role_id' => $this->customRoleId,
		]);
	}
}
