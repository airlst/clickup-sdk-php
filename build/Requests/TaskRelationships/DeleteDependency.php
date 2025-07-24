<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\TaskRelationships;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * DeleteDependency.
 *
 * Remove the dependency relationship between two or more tasks.
 */
class DeleteDependency extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param bool|null      $customTaskIds if you want to reference a task by it's custom task id, this value must be `true`
     * @param float|int|null $teamId        When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
     *                                      \
     *                                      For example: `custom_task_ids=true&team_id=123`.
     */
    public function __construct(
        protected string $taskId,
        protected string $dependsOn,
        protected string $dependencyOf,
        protected ?bool $customTaskIds = null,
        protected float|int|null $teamId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/task/{$this->taskId}/dependency";
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'depends_on' => $this->dependsOn,
            'dependency_of' => $this->dependencyOf,
            'custom_task_ids' => $this->customTaskIds,
            'team_id' => $this->teamId,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
