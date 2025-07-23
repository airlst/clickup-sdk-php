<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Lists;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * AddTaskToList.
 *
 * Add a task to an additional List. \
 *  \
 * ***Note:** This endpoint requires the [Tasks in Multiple List
 * ClickApp](https://help.clickup.com/hc/en-us/articles/6309958824727-Tasks-in-Multiple-Lists) to be
 * enabled.*
 */
class AddTaskToList extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected float|int $listId,
        protected string $taskId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/list/{$this->listId}/task/{$this->taskId}";
    }
}
