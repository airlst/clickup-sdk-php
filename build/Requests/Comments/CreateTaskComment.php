<?php

namespace ClickUp\V2\Requests\Comments;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateTaskComment
 *
 * Add a new comment to a task.
 */
class CreateTaskComment extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/task/{$this->taskId}/comment";
	}


	/**
	 * @param string $taskId
	 * @param string $commentText
	 * @param null|int $assignee
	 * @param null|string $groupAssignee
	 * @param bool $notifyAll If `notify_all` is true, notifications will be sent to everyone including the creator of the comment.
	 * @param null|bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param null|float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function __construct(
		protected string $taskId,
		protected string $commentText,
		protected ?int $assignee = null,
		protected ?string $groupAssignee = null,
		protected bool $notifyAll,
		protected ?bool $customTaskIds = null,
		protected float|int|null $teamId = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'comment_text' => $this->commentText,
			'assignee' => $this->assignee,
			'group_assignee' => $this->groupAssignee,
			'notify_all' => $this->notifyAll,
		]);
	}


	public function defaultQuery(): array
	{
		return array_filter(['custom_task_ids' => $this->customTaskIds, 'team_id' => $this->teamId]);
	}
}
