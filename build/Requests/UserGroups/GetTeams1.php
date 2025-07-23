<?php

namespace ClickUp\V2\Requests\UserGroups;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetTeams1
 *
 * This endpoint is used to view [User
 * Groups](https://docs.clickup.com/en/articles/4010016-teams-how-to-create-user-groups) in your
 * Workspace.\
 *  \
 * In our API documentation, `team_id` refers to the ID of a Workspace, and `group_id`
 * refers to the ID of a User Group.
 */
class GetTeams1 extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/group";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param null|string $groupIds Enter one or more User Group IDs to retrieve information about specific User Group.
	 */
	public function __construct(
		protected float|int $teamId,
		protected ?string $groupIds = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['team_id' => $this->teamId, 'group_ids' => $this->groupIds]);
	}
}
