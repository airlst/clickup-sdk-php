<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Guests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * AddGuestToTask.
 *
 * Share a task with a guest. \
 *  \
 * ***Note:** This endpoint is only available to Workspaces on our
 * [Enterprise Plan](https://clickup.com/pricing).*
 */
class AddGuestToTask extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param string         $permissionLevel can be `read` (view only), `comment`, `edit`, or `create` (full)
     * @param bool|null      $includeShared   Exclude details of items shared with the guest by setting this parameter to `false`. By default this parameter is set to `true`.
     * @param bool|null      $customTaskIds   if you want to reference a task by it's custom task id, this value must be `true`
     * @param float|int|null $teamId          When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
     *                                        \
     *                                        For example: `custom_task_ids=true&team_id=123`.
     */
    public function __construct(
        protected string $taskId,
        protected float|int $guestId,
        protected string $permissionLevel,
        protected ?bool $includeShared = null,
        protected ?bool $customTaskIds = null,
        protected float|int|null $teamId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/task/{$this->taskId}/guest/{$this->guestId}";
    }

    public function defaultBody(): array
    {
        return array_filter(['permission_level' => $this->permissionLevel]);
    }

    protected function defaultQuery(): array
    {
        return array_filter(['include_shared' => $this->includeShared, 'custom_task_ids' => $this->customTaskIds, 'team_id' => $this->teamId]);
    }
}
