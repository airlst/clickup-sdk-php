<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Tasks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * mergeTasks.
 *
 * Merge multiple tasks into a target task. The target task is specified by the task_id parameter,
 * while the source tasks to be merged are provided in the request body. Custom Task IDs are not
 * supported.
 */
class MergeTasks extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param string $taskId        ID of the target task that other tasks will be merged into
     * @param array  $sourceTaskIds array of task IDs to merge into the target task
     */
    public function __construct(
        protected string $taskId,
        protected array $sourceTaskIds,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/task/{$this->taskId}/merge";
    }

    public function defaultBody(): array
    {
        return ['source_task_ids' => $this->sourceTaskIds];
    }
}
