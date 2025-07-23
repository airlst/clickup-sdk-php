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
	 * @param string $name
	 * @param string $content
	 * @param string $markdownContent Use `markdown_content` instead of `content` to format your List description.
	 * @param int $dueDate
	 * @param bool $dueDateTime
	 * @param int $priority
	 * @param int $assignee Include a `user_id` to assign this List.
	 * @param string $status **Status** refers to the List color rather than the task Statuses available in the List.
	 */
	public function createList(
		float|int $folderId,
		string $name,
		?string $content = null,
		?string $markdownContent = null,
		?int $dueDate = null,
		?bool $dueDateTime = null,
		?int $priority = null,
		?int $assignee = null,
		?string $status = null,
	): Response
	{
		return $this->connector->send(new CreateList($folderId, $name, $content, $markdownContent, $dueDate, $dueDateTime, $priority, $assignee, $status));
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
	 * @param string $name
	 * @param string $content
	 * @param string $markdownContent Use `markdown_content` instead of `content` to format your List description.
	 * @param int $dueDate
	 * @param bool $dueDateTime
	 * @param int $priority
	 * @param int $assignee Include a `user_id` to add a List owner.
	 * @param string $status **Status** refers to the List color rather than the task Statuses available in the List.
	 */
	public function createFolderlessList(
		float|int $spaceId,
		string $name,
		?string $content = null,
		?string $markdownContent = null,
		?int $dueDate = null,
		?bool $dueDateTime = null,
		?int $priority = null,
		?int $assignee = null,
		?string $status = null,
	): Response
	{
		return $this->connector->send(new CreateFolderlessList($spaceId, $name, $content, $markdownContent, $dueDate, $dueDateTime, $priority, $assignee, $status));
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
	 * @param string $name
	 * @param string $content
	 * @param string $markdownContent Use `markdown_content` instead of `content` to format your List description.
	 * @param int $dueDate
	 * @param bool $dueDateTime
	 * @param int $priority
	 * @param string $assignee
	 * @param string $status **Status** refers to the List color rather than the task Statuses available in the List.
	 * @param bool $unsetStatus By default, this is `false.` To remove the List color use `unset_status: true`.
	 */
	public function updateList(
		string $listId,
		string $name,
		?string $content = null,
		?string $markdownContent = null,
		?int $dueDate = null,
		?bool $dueDateTime = null,
		?int $priority = null,
		?string $assignee = null,
		?string $status = null,
		?bool $unsetStatus = null,
	): Response
	{
		return $this->connector->send(new UpdateList($listId, $name, $content, $markdownContent, $dueDate, $dueDateTime, $priority, $assignee, $status, $unsetStatus));
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
	 * @param string $name Name of the new List
	 * @param array $options Options for creating the List
	 */
	public function createFolderListFromTemplate(
		string $folderId,
		string $templateId,
		string $name,
		?array $options = null,
	): Response
	{
		return $this->connector->send(new CreateFolderListFromTemplate($folderId, $templateId, $name, $options));
	}


	/**
	 * @param string $spaceId ID of the Space where the List will be created
	 * @param string $templateId ID of the template to use
	 * @param string $name Name of the new List
	 * @param array $options Options for creating the List
	 */
	public function createSpaceListFromTemplate(
		string $spaceId,
		string $templateId,
		string $name,
		?array $options = null,
	): Response
	{
		return $this->connector->send(new CreateSpaceListFromTemplate($spaceId, $templateId, $name, $options));
	}
}
