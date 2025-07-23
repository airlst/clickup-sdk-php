<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\CustomFields\GetAccessibleCustomFields;
use ClickUp\V2\Requests\CustomFields\GetFolderAvailableFields;
use ClickUp\V2\Requests\CustomFields\GetSpaceAvailableFields;
use ClickUp\V2\Requests\CustomFields\GetTeamAvailableFields;
use ClickUp\V2\Requests\CustomFields\RemoveCustomFieldValue;
use ClickUp\V2\Requests\CustomFields\SetCustomFieldValue;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class CustomFields extends Resource
{
	/**
	 * @param float|int $listId
	 */
	public function getAccessibleCustomFields(float|int $listId): Response
	{
		return $this->connector->send(new GetAccessibleCustomFields($listId));
	}


	/**
	 * @param float|int $folderId
	 */
	public function getFolderAvailableFields(float|int $folderId): Response
	{
		return $this->connector->send(new GetFolderAvailableFields($folderId));
	}


	/**
	 * @param float|int $spaceId
	 */
	public function getSpaceAvailableFields(float|int $spaceId): Response
	{
		return $this->connector->send(new GetSpaceAvailableFields($spaceId));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function getTeamAvailableFields(float|int $teamId): Response
	{
		return $this->connector->send(new GetTeamAvailableFields($teamId));
	}


	/**
	 * @param string $taskId Enter the task ID of the task you want to update.
	 * @param string $fieldId Enter the universal unique identifier (UUID) of the Custom Field you want to set.
	 * @param bool $customTaskIds If you want to reference a task by its Custom Task ID, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function setCustomFieldValue(
		string $taskId,
		string $fieldId,
		?bool $customTaskIds = null,
		float|int|null $teamId = null,
	): Response
	{
		return $this->connector->send(new SetCustomFieldValue($taskId, $fieldId, $customTaskIds, $teamId));
	}


	/**
	 * @param string $taskId
	 * @param string $fieldId b8a8-48d8-a0c6-b4200788a683 (uuid)
	 * @param bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function removeCustomFieldValue(
		string $taskId,
		string $fieldId,
		?bool $customTaskIds = null,
		float|int|null $teamId = null,
	): Response
	{
		return $this->connector->send(new RemoveCustomFieldValue($taskId, $fieldId, $customTaskIds, $teamId));
	}
}
