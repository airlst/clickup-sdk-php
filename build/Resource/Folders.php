<?php

declare(strict_types=1);

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Folders\CreateFolder;
use ClickUp\V2\Requests\Folders\CreateFolderFromTemplate;
use ClickUp\V2\Requests\Folders\DeleteFolder;
use ClickUp\V2\Requests\Folders\GetFolder;
use ClickUp\V2\Requests\Folders\GetFolders;
use ClickUp\V2\Requests\Folders\UpdateFolder;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Folders extends Resource
{
    public function getFolders(float|int $spaceId, ?bool $archived = null): Response
    {
        return $this->connector->send(new GetFolders($spaceId, $archived));
    }

    public function createFolder(float|int $spaceId, string $name): Response
    {
        return $this->connector->send(new CreateFolder($spaceId, $name));
    }

    public function getFolder(float|int $folderId): Response
    {
        return $this->connector->send(new GetFolder($folderId));
    }

    public function updateFolder(float|int $folderId, string $name): Response
    {
        return $this->connector->send(new UpdateFolder($folderId, $name));
    }

    public function deleteFolder(float|int $folderId): Response
    {
        return $this->connector->send(new DeleteFolder($folderId));
    }

    /**
     * @param string $spaceId    ID of the Space where the Folder will be created
     * @param string $templateId ID of the Folder template to use
     * @param string $name       Name of the new Folder
     * @param array  $options    Options for creating the Folder
     */
    public function createFolderFromTemplate(
        string $spaceId,
        string $templateId,
        string $name,
        ?array $options = null,
    ): Response {
        return $this->connector->send(new CreateFolderFromTemplate($spaceId, $templateId, $name, $options));
    }
}
