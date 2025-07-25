<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\UserGroups;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * UpdateTeam.
 *
 * This endpoint is used to manage [User
 * Groups](https://docs.clickup.com/en/articles/4010016-teams-how-to-create-user-groups), which are
 * groups of users within your Workspace.\
 *  \
 * In our API, `team_id` in the path refers to the Workspace
 * ID, and `group_id` refers to the ID of a User Group.\
 *  \
 * **Note:** Adding a guest with view-only
 * permissions to a User Group automatically converts them to a paid guest.\
 *  \
 * If you don't have any
 * paid guest seats available, a new member seat is automatically added to increase the number of paid
 * guest seats.\
 *  \
 * This incurs a prorated charge based on your billing cycle.
 */
class UpdateTeam extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param string $groupId User Group ID
     */
    public function __construct(
        protected string $groupId,
        protected ?string $name = null,
        protected ?string $handle = null,
        protected ?array $members = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/group/{$this->groupId}";
    }

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name, 'handle' => $this->handle, 'members' => $this->members], fn (mixed $value): bool => ! is_null($value));
    }
}
