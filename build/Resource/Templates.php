<?php

declare(strict_types=1);

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Templates\GetTaskTemplates;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Templates extends Resource
{
    /**
     * @param float|int $teamId Workspace ID
     */
    public function getTaskTemplates(float|int $teamId, int $page): Response
    {
        return $this->connector->send(new GetTaskTemplates($teamId, $page));
    }
}
