<?php

declare(strict_types=1);

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\PrivacyAndAccess\UpdatePrivacyAndAccess;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class PrivacyAndAccess extends Resource
{
    /**
     * @param string $workspaceId the ID of the Workspace
     * @param string $objectType  Any object that can be shared in a Workspace. For example, `customField`, `dashboard`, `folder`, `goal`, `goalFolder`,`list`, `space`, `task`, and `view`.
     * @param string $objectId    the ID of the object to share
     * @param array  $entries     the user or user group (Team) you wish to give, remove, or edit permissions
     * @param bool   $private     the privacy of an object or location
     */
    public function updatePrivacyAndAccess(
        string $workspaceId,
        string $objectType,
        string $objectId,
        ?array $entries = null,
        ?bool $private = null,
    ): Response {
        return $this->connector->send(new UpdatePrivacyAndAccess($workspaceId, $objectType, $objectId, $entries, $private));
    }
}
