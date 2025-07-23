<?php

namespace ClickUp\V2\Requests\Guests;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * EditGuestOnWorkspace
 *
 * Configure options for a guest. \
 *  \
 * ***Note:** This endpoint is only available to Workspaces on our
 * [Enterprise Plan](https://clickup.com/pricing).*
 */
class EditGuestOnWorkspace extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/guest/{$this->guestId}";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param float|int $guestId
	 * @param null|bool $canSeePointsEstimated
	 * @param null|bool $canEditTags
	 * @param null|bool $canSeeTimeSpent
	 * @param null|bool $canSeeTimeEstimated
	 * @param null|bool $canCreateViews
	 * @param null|int $customRoleId
	 */
	public function __construct(
		protected float|int $teamId,
		protected float|int $guestId,
		protected ?bool $canSeePointsEstimated = null,
		protected ?bool $canEditTags = null,
		protected ?bool $canSeeTimeSpent = null,
		protected ?bool $canSeeTimeEstimated = null,
		protected ?bool $canCreateViews = null,
		protected ?int $customRoleId = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'can_see_points_estimated' => $this->canSeePointsEstimated,
			'can_edit_tags' => $this->canEditTags,
			'can_see_time_spent' => $this->canSeeTimeSpent,
			'can_see_time_estimated' => $this->canSeeTimeEstimated,
			'can_create_views' => $this->canCreateViews,
			'custom_role_id' => $this->customRoleId,
		]);
	}
}
