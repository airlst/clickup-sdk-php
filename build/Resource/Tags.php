<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Tags\AddTagToTask;
use ClickUp\V2\Requests\Tags\CreateSpaceTag;
use ClickUp\V2\Requests\Tags\DeleteSpaceTag;
use ClickUp\V2\Requests\Tags\EditSpaceTag;
use ClickUp\V2\Requests\Tags\GetSpaceTags;
use ClickUp\V2\Requests\Tags\RemoveTagFromTask;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Tags extends Resource
{
	/**
	 * @param float|int $spaceId
	 */
	public function getSpaceTags(float|int $spaceId): Response
	{
		return $this->connector->send(new GetSpaceTags($spaceId));
	}


	/**
	 * @param float|int $spaceId
	 * @param array $tag
	 */
	public function createSpaceTag(float|int $spaceId, array $tag): Response
	{
		return $this->connector->send(new CreateSpaceTag($spaceId, $tag));
	}


	/**
	 * @param float|int $spaceId
	 * @param string $tagName
	 * @param array $tag
	 */
	public function editSpaceTag(float|int $spaceId, string $tagName, array $tag): Response
	{
		return $this->connector->send(new EditSpaceTag($spaceId, $tagName, $tag));
	}


	/**
	 * @param float|int $spaceId
	 * @param string $tagName
	 * @param array $tag
	 */
	public function deleteSpaceTag(float|int $spaceId, string $tagName, array $tag): Response
	{
		return $this->connector->send(new DeleteSpaceTag($spaceId, $tagName, $tag));
	}


	/**
	 * @param string $taskId
	 * @param string $tagName
	 * @param bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function addTagToTask(
		string $taskId,
		string $tagName,
		?bool $customTaskIds = null,
		float|int|null $teamId = null,
	): Response
	{
		return $this->connector->send(new AddTagToTask($taskId, $tagName, $customTaskIds, $teamId));
	}


	/**
	 * @param string $taskId
	 * @param string $tagName
	 * @param bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function removeTagFromTask(
		string $taskId,
		string $tagName,
		?bool $customTaskIds = null,
		float|int|null $teamId = null,
	): Response
	{
		return $this->connector->send(new RemoveTagFromTask($taskId, $tagName, $customTaskIds, $teamId));
	}
}
