<?php

namespace ClickUp\V2\Requests\Comments;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetTaskComments
 *
 * View task comments. \
 *  \
 * If you do not include the `start` and `start_id` parameters, this endpoint
 * will return the most recent 25 comments.\
 *  \
 * Use the `start` and `start id` parameters of the oldest
 * comment to retrieve the next 25 comments.
 */
class GetTaskComments extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/task/{$this->taskId}/comment";
	}


	/**
	 * @param string $taskId
	 * @param null|bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param null|float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 * @param null|int $start Enter the `date` of a task comment using Unix time in milliseconds.
	 * @param null|string $startId Enter the Comment `id` of a task comment.
	 */
	public function __construct(
		protected string $taskId,
		protected ?bool $customTaskIds = null,
		protected float|int|null $teamId = null,
		protected ?int $start = null,
		protected ?string $startId = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'custom_task_ids' => $this->customTaskIds,
			'team_id' => $this->teamId,
			'start' => $this->start,
			'start_id' => $this->startId,
		]);
	}
}
