<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Guests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * RemoveGuestFromTask.
 *
 * Revoke a guest's access to a task. \
 *  \
 * ***Note:** This endpoint is only available to Workspaces on
 * our [Enterprise Plan](https://clickup.com/pricing).*
 */
class RemoveGuestFromTask extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param bool|null      $includeShared Exclude details of items shared with the guest by setting this parameter to `false`. By default this parameter is set to `true`.
     * @param bool|null      $customTaskIds if you want to reference a task by it's custom task id, this value must be `true`
     * @param float|int|null $teamId        When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
     *                                      \
     *                                      For example: `custom_task_ids=true&team_id=123`.
     */
    public function __construct(
        protected string $taskId,
        protected float|int $guestId,
        protected ?bool $includeShared = null,
        protected ?bool $customTaskIds = null,
        protected float|int|null $teamId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/task/{$this->taskId}/guest/{$this->guestId}";
    }

    protected function defaultQuery(): array
    {
        return array_filter(['include_shared' => $this->includeShared, 'custom_task_ids' => $this->customTaskIds, 'team_id' => $this->teamId], fn (mixed $value): bool => ! is_null($value));
    }
}
