<?php

declare(strict_types=1);

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\SharedHierarchy\SharedHierarchy as SharedHierarchyRequest;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class SharedHierarchy extends Resource
{
    /**
     * @param float|int $teamId Workspace ID
     */
    public function sharedHierarchy(float|int $teamId): Response
    {
        return $this->connector->send(new SharedHierarchyRequest($teamId));
    }
}
