<?php

declare(strict_types=1);

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Members\GetListMembers;
use ClickUp\V2\Requests\Members\GetTaskMembers;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Members extends Resource
{
    public function getTaskMembers(string $taskId): Response
    {
        return $this->connector->send(new GetTaskMembers($taskId));
    }

    public function getListMembers(float|int $listId): Response
    {
        return $this->connector->send(new GetListMembers($listId));
    }
}
