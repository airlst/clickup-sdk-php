<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Tasks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetTask'sTimeinStatus.
 *
 * View how long a task has been in each status. The Total time in Status ClickApp must first be
 * enabled by the Workspace owner or an admin.
 */
class GetTaskTimeinStatus extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param bool|null      $customTaskIds if you want to reference a task by it's custom task id, this value must be `true`
     * @param float|int|null $teamId        When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
     *                                      \
     *                                      For example: `custom_task_ids=true&team_id=123`.
     */
    public function __construct(
        protected string $taskId,
        protected ?bool $customTaskIds = null,
        protected float|int|null $teamId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/task/{$this->taskId}/time_in_status";
    }

    protected function defaultQuery(): array
    {
        return array_filter(['custom_task_ids' => $this->customTaskIds, 'team_id' => $this->teamId]);
    }
}
