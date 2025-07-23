<?php

declare(strict_types=1);

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\CustomTaskTypes\GetCustomItems;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class CustomTaskTypes extends Resource
{
    /**
     * @param float|int $teamId Workspace ID
     */
    public function getCustomItems(float|int $teamId): Response
    {
        return $this->connector->send(new GetCustomItems($teamId));
    }
}
