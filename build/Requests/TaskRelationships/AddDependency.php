<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\TaskRelationships;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * AddDependency.
 *
 * Set a task as waiting on or blocking another task.
 */
class AddDependency extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param string         $taskId        this is the task which is waiting on or blocking another task
     * @param bool|null      $customTaskIds if you want to reference a task by it's custom task id, this value must be `true`
     * @param float|int|null $teamId        When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
     *                                      \
     *                                      For example: `custom_task_ids=true&team_id=123`.
     */
    public function __construct(
        protected string $taskId,
        protected ?string $dependsOn = null,
        protected ?string $depedencyOf = null,
        protected ?bool $customTaskIds = null,
        protected float|int|null $teamId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/task/{$this->taskId}/dependency";
    }

    public function defaultBody(): array
    {
        return array_filter(['depends_on' => $this->dependsOn, 'depedency_of' => $this->depedencyOf]);
    }

    protected function defaultQuery(): array
    {
        return array_filter(['custom_task_ids' => $this->customTaskIds, 'team_id' => $this->teamId]);
    }
}
