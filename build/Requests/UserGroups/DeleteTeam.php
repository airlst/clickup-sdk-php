<?php

namespace ClickUp\V2\Requests\UserGroups;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteTeam
 *
 * This endpoint is used to remove a [User
 * Group](https://docs.clickup.com/en/articles/4010016-teams-how-to-create-user-groups) from your
 * Workspace.\
 *  \
 * In our API documentation, `team_id` refers to the id of a Workspace, and `group_id`
 * refers to the id of a user group.
 */
class DeleteTeam extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v2/group/{$this->groupId}";
	}


	/**
	 * @param string $groupId User Group ID
	 */
	public function __construct(
		protected string $groupId,
	) {
	}
}
