<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\UserGroups;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * GetTeams1.
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

    /**
     * @param float|int   $teamId   Workspace ID
     * @param string|null $groupIds enter one or more User Group IDs to retrieve information about specific User Group
     */
    public function __construct(
        protected float|int $teamId,
        protected ?string $groupIds = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/v2/group';
    }

    protected function defaultQuery(): array
    {
        return array_filter(['team_id' => $this->teamId, 'group_ids' => $this->groupIds], fn (mixed $value): bool => ! is_null($value));
    }
}
