<?php

namespace ClickUp\V2\Requests\UserGroups;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateUserGroup
 *
 * This endpoint creates a [User
 * Group](https://docs.clickup.com/en/articles/4010016-teams-how-to-create-user-groups) within a
 * Workspace.\
 *  \
 * User Groups are used to organize and manage users within a Workspace.\
 *  \
 * In the API
 * documentation, `team_id` refers to the Workspace ID, and `group_id` refers to the User Group ID.\
 *
 * \
 * **Note:** Adding a guest with view-only permissions to a Team automatically converts them to a
 * paid guest.\
 *  \
 * If no paid guest seats are available, an additional member seat will be added,
 * increasing the number of paid guest seats.\
 *  \
 * This change incurs a prorated charge based on the
 * billing cycle.
 */
class CreateUserGroup extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/group";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param string $name
	 * @param null|string $handle
	 * @param array $members
	 */
	public function __construct(
		protected float|int $teamId,
		protected string $name,
		protected ?string $handle = null,
		protected array $members,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['name' => $this->name, 'handle' => $this->handle, 'members' => $this->members]);
	}
}
