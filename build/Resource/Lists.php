<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Lists\AddTaskToList;
use ClickUp\V2\Requests\Lists\CreateFolderListFromTemplate;
use ClickUp\V2\Requests\Lists\CreateFolderlessList;
use ClickUp\V2\Requests\Lists\CreateList;
use ClickUp\V2\Requests\Lists\CreateSpaceListFromTemplate;
use ClickUp\V2\Requests\Lists\DeleteList;
use ClickUp\V2\Requests\Lists\GetFolderlessLists;
use ClickUp\V2\Requests\Lists\GetList;
use ClickUp\V2\Requests\Lists\GetLists;
use ClickUp\V2\Requests\Lists\RemoveTaskFromList;
use ClickUp\V2\Requests\Lists\UpdateList;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Lists extends Resource
{
	/**
	 * @param float|int $folderId
	 * @param bool $archived
	 */
	public function getLists(float|int $folderId, ?bool $archived = null): Response
	{
		return $this->connector->send(new GetLists($folderId, $archived));
	}


	/**
	 * @param float|int $folderId
	 */
	public function createList(float|int $folderId): Response
	{
		return $this->connector->send(new CreateList($folderId));
	}


	/**
	 * @param float|int $spaceId
	 * @param bool $archived
	 */
	public function getFolderlessLists(float|int $spaceId, ?bool $archived = null): Response
	{
		return $this->connector->send(new GetFolderlessLists($spaceId, $archived));
	}


	/**
	 * @param float|int $spaceId
	 */
	public function createFolderlessList(float|int $spaceId): Response
	{
		return $this->connector->send(new CreateFolderlessList($spaceId));
	}


	/**
	 * @param float|int $listId The List ID. To find the List ID, right-click the List in your Sidebar, select Copy link, and paste the link in your URL. The last string in the URL is your List ID.
	 */
	public function getList(float|int $listId): Response
	{
		return $this->connector->send(new GetList($listId));
	}


	/**
	 * @param string $listId
	 */
	public function updateList(string $listId): Response
	{
		return $this->connector->send(new UpdateList($listId));
	}


	/**
	 * @param float|int $listId
	 */
	public function deleteList(float|int $listId): Response
	{
		return $this->connector->send(new DeleteList($listId));
	}


	/**
	 * @param float|int $listId
	 * @param string $taskId
	 */
	public function addTaskToList(float|int $listId, string $taskId): Response
	{
		return $this->connector->send(new AddTaskToList($listId, $taskId));
	}


	/**
	 * @param float|int $listId
	 * @param string $taskId
	 */
	public function removeTaskFromList(float|int $listId, string $taskId): Response
	{
		return $this->connector->send(new RemoveTaskFromList($listId, $taskId));
	}


	/**
	 * @param string $folderId ID of the Folder where the List will be created
	 * @param string $templateId ID of the template to use
	 */
	public function createFolderListFromTemplate(string $folderId, string $templateId): Response
	{
		return $this->connector->send(new CreateFolderListFromTemplate($folderId, $templateId));
	}


	/**
	 * @param string $spaceId ID of the Space where the List will be created
	 * @param string $templateId ID of the template to use
	 */
	public function createSpaceListFromTemplate(string $spaceId, string $templateId): Response
	{
		return $this->connector->send(new CreateSpaceListFromTemplate($spaceId, $templateId));
	}
}
