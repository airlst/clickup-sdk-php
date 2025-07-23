<?php

namespace ClickUp\V2\Requests\TimeTracking;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Createatimeentry
 *
 * Create a time entry. \
 *  \
 * ***Note:** A time entry that has a negative duration means that timer is
 * currently running for that user.*
 */
class Createatimeentry extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/time_entries";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param null|string $description
	 * @param null|array $tags Users on the Business Plan and above can include a time tracking label.
	 * @param int $start
	 * @param null|int $stop The `duration` parameter can be used instead of the `stop` parameter.
	 * @param null|int $end
	 * @param null|bool $billable
	 * @param int $duration When there are values for both `start` and `end`, `duration` is ignored. The `stop` parameter can be used instead of the `duration` parameter.
	 * @param null|int $assignee Workspace owners and admins can include any user id. Workspace members can only include their own user id.
	 * @param null|string $tid
	 * @param null|bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param null|float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function __construct(
		protected float|int|null $teamId = null,
		protected ?string $description = null,
		protected ?array $tags = null,
		protected int $start,
		protected ?int $stop = null,
		protected ?int $end = null,
		protected ?bool $billable = null,
		protected int $duration,
		protected ?int $assignee = null,
		protected ?string $tid = null,
		protected ?bool $customTaskIds = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'description' => $this->description,
			'tags' => $this->tags,
			'start' => $this->start,
			'stop' => $this->stop,
			'end' => $this->end,
			'billable' => $this->billable,
			'duration' => $this->duration,
			'assignee' => $this->assignee,
			'tid' => $this->tid,
		]);
	}


	public function defaultQuery(): array
	{
		return array_filter(['custom_task_ids' => $this->customTaskIds, 'team_id' => $this->teamId]);
	}
}
