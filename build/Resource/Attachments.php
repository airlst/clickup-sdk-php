<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Attachments\CreateTaskAttachment;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Attachments extends Resource
{
	/**
	 * @param string $taskId
	 * @param bool $customTaskIds If you want to reference a task by its custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function createTaskAttachment(
		string $taskId,
		?bool $customTaskIds = null,
		float|int|null $teamId = null,
	): Response
	{
		return $this->connector->send(new CreateTaskAttachment($taskId, $customTaskIds, $teamId));
	}
}
