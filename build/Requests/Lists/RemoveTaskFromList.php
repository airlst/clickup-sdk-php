<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Lists;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * RemoveTaskFromList.
 *
 * Remove a task from an additional List. You can't remove a task from its home List. \
 *  \
 * ***Note:**
 * This endpoint requires the [Tasks in Multiple List
 * ClickApp](https://help.clickup.com/hc/en-us/articles/6309958824727-Tasks-in-Multiple-Lists) to be
 * enabled.*
 */
class RemoveTaskFromList extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected float|int $listId,
        protected string $taskId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/list/{$this->listId}/task/{$this->taskId}";
    }
}
