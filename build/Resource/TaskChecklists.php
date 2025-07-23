<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\TaskChecklists\CreateChecklist;
use ClickUp\V2\Requests\TaskChecklists\CreateChecklistItem;
use ClickUp\V2\Requests\TaskChecklists\DeleteChecklist;
use ClickUp\V2\Requests\TaskChecklists\DeleteChecklistItem;
use ClickUp\V2\Requests\TaskChecklists\EditChecklist;
use ClickUp\V2\Requests\TaskChecklists\EditChecklistItem;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class TaskChecklists extends Resource
{
	/**
	 * @param string $taskId
	 * @param string $name
	 * @param bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function createChecklist(
		string $taskId,
		string $name,
		?bool $customTaskIds = null,
		float|int|null $teamId = null,
	): Response
	{
		return $this->connector->send(new CreateChecklist($taskId, $name, $customTaskIds, $teamId));
	}


	/**
	 * @param string $checklistId b8a8-48d8-a0c6-b4200788a683 (uuid)
	 * @param string $name
	 * @param int $position Position refers to the order of appearance of checklists on a task.\
	 *  \
	 * To set a checklist to appear at the top of the checklists section of a task, use `"position": 0`.
	 */
	public function editChecklist(string $checklistId, ?string $name = null, ?int $position = null): Response
	{
		return $this->connector->send(new EditChecklist($checklistId, $name, $position));
	}


	/**
	 * @param string $checklistId b8a8-48d8-a0c6-b4200788a683 (uuid)
	 */
	public function deleteChecklist(string $checklistId): Response
	{
		return $this->connector->send(new DeleteChecklist($checklistId));
	}


	/**
	 * @param string $checklistId b8a8-48d8-a0c6-b4200788a683 (uuid)
	 * @param string $name
	 * @param int $assignee
	 */
	public function createChecklistItem(string $checklistId, ?string $name = null, ?int $assignee = null): Response
	{
		return $this->connector->send(new CreateChecklistItem($checklistId, $name, $assignee));
	}


	/**
	 * @param string $checklistId b8a8-48d8-a0c6-b4200788a683 (uuid)
	 * @param string $checklistItemId e491-47f5-9fd8-d1dc4cedcc6f (uuid)
	 * @param string $name
	 * @param mixed $assignee
	 * @param bool $resolved
	 * @param mixed $parent To nest a checklist item under another checklist item, include the other item's `checklist_item_id`.
	 */
	public function editChecklistItem(
		string $checklistId,
		string $checklistItemId,
		?string $name = null,
		mixed $assignee = null,
		?bool $resolved = null,
		mixed $parent = null,
	): Response
	{
		return $this->connector->send(new EditChecklistItem($checklistId, $checklistItemId, $name, $assignee, $resolved, $parent));
	}


	/**
	 * @param string $checklistId b8a8-48d8-a0c6-b4200788a683 (uuid)
	 * @param string $checklistItemId e491-47f5-9fd8-d1dc4cedcc6f (uuid)
	 */
	public function deleteChecklistItem(string $checklistId, string $checklistItemId): Response
	{
		return $this->connector->send(new DeleteChecklistItem($checklistId, $checklistItemId));
	}
}
