<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Guests\AddGuestToFolder;
use ClickUp\V2\Requests\Guests\AddGuestToList;
use ClickUp\V2\Requests\Guests\AddGuestToTask;
use ClickUp\V2\Requests\Guests\EditGuestOnWorkspace;
use ClickUp\V2\Requests\Guests\GetGuest;
use ClickUp\V2\Requests\Guests\InviteGuestToWorkspace;
use ClickUp\V2\Requests\Guests\RemoveGuestFromFolder;
use ClickUp\V2\Requests\Guests\RemoveGuestFromList;
use ClickUp\V2\Requests\Guests\RemoveGuestFromTask;
use ClickUp\V2\Requests\Guests\RemoveGuestFromWorkspace;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Guests extends Resource
{
	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function inviteGuestToWorkspace(float|int $teamId): Response
	{
		return $this->connector->send(new InviteGuestToWorkspace($teamId));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param float|int $guestId
	 */
	public function getGuest(float|int $teamId, float|int $guestId): Response
	{
		return $this->connector->send(new GetGuest($teamId, $guestId));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param float|int $guestId
	 */
	public function editGuestOnWorkspace(float|int $teamId, float|int $guestId): Response
	{
		return $this->connector->send(new EditGuestOnWorkspace($teamId, $guestId));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param float|int $guestId
	 */
	public function removeGuestFromWorkspace(float|int $teamId, float|int $guestId): Response
	{
		return $this->connector->send(new RemoveGuestFromWorkspace($teamId, $guestId));
	}


	/**
	 * @param string $taskId
	 * @param float|int $guestId
	 * @param bool $includeShared Exclude details of items shared with the guest by setting this parameter to `false`. By default this parameter is set to `true`.
	 * @param bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function addGuestToTask(
		string $taskId,
		float|int $guestId,
		?bool $includeShared = null,
		?bool $customTaskIds = null,
		float|int|null $teamId = null,
	): Response
	{
		return $this->connector->send(new AddGuestToTask($taskId, $guestId, $includeShared, $customTaskIds, $teamId));
	}


	/**
	 * @param string $taskId
	 * @param float|int $guestId
	 * @param bool $includeShared Exclude details of items shared with the guest by setting this parameter to `false`. By default this parameter is set to `true`.
	 * @param bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function removeGuestFromTask(
		string $taskId,
		float|int $guestId,
		?bool $includeShared = null,
		?bool $customTaskIds = null,
		float|int|null $teamId = null,
	): Response
	{
		return $this->connector->send(new RemoveGuestFromTask($taskId, $guestId, $includeShared, $customTaskIds, $teamId));
	}


	/**
	 * @param float|int $listId
	 * @param float|int $guestId
	 * @param bool $includeShared Exclude details of items shared with the guest by setting this parameter to `false`. By default this parameter is set to `true`.
	 */
	public function addGuestToList(float|int $listId, float|int $guestId, ?bool $includeShared = null): Response
	{
		return $this->connector->send(new AddGuestToList($listId, $guestId, $includeShared));
	}


	/**
	 * @param float|int $listId
	 * @param float|int $guestId
	 * @param bool $includeShared Exclude details of items shared with the guest by setting this parameter to `false`. By default this parameter is set to `true`.
	 */
	public function removeGuestFromList(float|int $listId, float|int $guestId, ?bool $includeShared = null): Response
	{
		return $this->connector->send(new RemoveGuestFromList($listId, $guestId, $includeShared));
	}


	/**
	 * @param float|int $folderId
	 * @param float|int $guestId
	 * @param bool $includeShared Exclude details of items shared with the guest by setting this parameter to `false`. By default this parameter is set to `true`.
	 */
	public function addGuestToFolder(float|int $folderId, float|int $guestId, ?bool $includeShared = null): Response
	{
		return $this->connector->send(new AddGuestToFolder($folderId, $guestId, $includeShared));
	}


	/**
	 * @param float|int $folderId
	 * @param float|int $guestId
	 * @param bool $includeShared Exclude details of items shared with the guest by setting this parameter to `false`. By default this parameter is set to `true`.
	 */
	public function removeGuestFromFolder(float|int $folderId, float|int $guestId, ?bool $includeShared = null): Response
	{
		return $this->connector->send(new RemoveGuestFromFolder($folderId, $guestId, $includeShared));
	}
}
