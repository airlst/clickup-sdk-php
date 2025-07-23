<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Comments\CreateChatViewComment;
use ClickUp\V2\Requests\Comments\CreateListComment;
use ClickUp\V2\Requests\Comments\CreateTaskComment;
use ClickUp\V2\Requests\Comments\CreateThreadedComment;
use ClickUp\V2\Requests\Comments\DeleteComment;
use ClickUp\V2\Requests\Comments\GetChatViewComments;
use ClickUp\V2\Requests\Comments\GetListComments;
use ClickUp\V2\Requests\Comments\GetTaskComments;
use ClickUp\V2\Requests\Comments\GetThreadedComments;
use ClickUp\V2\Requests\Comments\UpdateComment;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Comments extends Resource
{
	/**
	 * @param string $taskId
	 * @param bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 * @param int $start Enter the `date` of a task comment using Unix time in milliseconds.
	 * @param string $startId Enter the Comment `id` of a task comment.
	 */
	public function getTaskComments(
		string $taskId,
		?bool $customTaskIds = null,
		float|int|null $teamId = null,
		?int $start = null,
		?string $startId = null,
	): Response
	{
		return $this->connector->send(new GetTaskComments($taskId, $customTaskIds, $teamId, $start, $startId));
	}


	/**
	 * @param string $taskId
	 * @param bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function createTaskComment(
		string $taskId,
		?bool $customTaskIds = null,
		float|int|null $teamId = null,
	): Response
	{
		return $this->connector->send(new CreateTaskComment($taskId, $customTaskIds, $teamId));
	}


	/**
	 * @param string $viewId 105 (string)
	 * @param int $start Enter the `date` of a Chat view comment using Unix time in milliseconds.
	 * @param string $startId Enter the Comment `id` of a Chat view comment.
	 */
	public function getChatViewComments(string $viewId, ?int $start = null, ?string $startId = null): Response
	{
		return $this->connector->send(new GetChatViewComments($viewId, $start, $startId));
	}


	/**
	 * @param string $viewId 105 (string)
	 */
	public function createChatViewComment(string $viewId): Response
	{
		return $this->connector->send(new CreateChatViewComment($viewId));
	}


	/**
	 * @param float|int $listId
	 * @param int $start Enter the `date` of a List info comment using Unix time in milliseconds.
	 * @param string $startId Enter the Comment `id` of a List info comment.
	 */
	public function getListComments(float|int $listId, ?int $start = null, ?string $startId = null): Response
	{
		return $this->connector->send(new GetListComments($listId, $start, $startId));
	}


	/**
	 * @param float|int $listId
	 */
	public function createListComment(float|int $listId): Response
	{
		return $this->connector->send(new CreateListComment($listId));
	}


	/**
	 * @param float|int $commentId
	 */
	public function updateComment(float|int $commentId): Response
	{
		return $this->connector->send(new UpdateComment($commentId));
	}


	/**
	 * @param float|int $commentId
	 */
	public function deleteComment(float|int $commentId): Response
	{
		return $this->connector->send(new DeleteComment($commentId));
	}


	/**
	 * @param float|int $commentId
	 */
	public function getThreadedComments(float|int $commentId): Response
	{
		return $this->connector->send(new GetThreadedComments($commentId));
	}


	/**
	 * @param float|int $commentId
	 */
	public function createThreadedComment(float|int $commentId): Response
	{
		return $this->connector->send(new CreateThreadedComment($commentId));
	}
}
