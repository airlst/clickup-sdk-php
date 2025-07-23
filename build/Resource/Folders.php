<?php

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
	/**
	 * @param float|int $spaceId
	 * @param bool $archived
	 */
	public function getFolders(float|int $spaceId, ?bool $archived = null): Response
	{
		return $this->connector->send(new GetFolders($spaceId, $archived));
	}


	/**
	 * @param float|int $spaceId
	 */
	public function createFolder(float|int $spaceId): Response
	{
		return $this->connector->send(new CreateFolder($spaceId));
	}


	/**
	 * @param float|int $folderId
	 */
	public function getFolder(float|int $folderId): Response
	{
		return $this->connector->send(new GetFolder($folderId));
	}


	/**
	 * @param float|int $folderId
	 */
	public function updateFolder(float|int $folderId): Response
	{
		return $this->connector->send(new UpdateFolder($folderId));
	}


	/**
	 * @param float|int $folderId
	 */
	public function deleteFolder(float|int $folderId): Response
	{
		return $this->connector->send(new DeleteFolder($folderId));
	}


	/**
	 * @param string $spaceId ID of the Space where the Folder will be created
	 * @param string $templateId ID of the Folder template to use.
	 */
	public function createFolderFromTemplate(string $spaceId, string $templateId): Response
	{
		return $this->connector->send(new CreateFolderFromTemplate($spaceId, $templateId));
	}
}
