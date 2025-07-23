<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Members;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetTaskMembers.
 *
 * View the people who have access to a task. Responses do not include people with inherited Hierarchy
 * permission to the task.
 */
class GetTaskMembers extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $taskId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/task/{$this->taskId}/member";
    }
}
