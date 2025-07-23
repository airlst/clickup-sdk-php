<?php

namespace ClickUp\V2\Requests\TimeTracking;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateatimeEntry
 *
 * Update the details of a time entry.
 */
class UpdateatimeEntry extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/time_entries/{$this->timerId}";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param float|int $timerId
	 * @param null|string $description
	 * @param array $tags Users on the Business Plan and above can include a time tracking label.
	 * @param null|string $tagAction
	 * @param null|int $start When providing `start`, you must also provide `end`.
	 * @param null|int $end When providing `end`, you must also provide `start`.
	 * @param string $tid
	 * @param null|bool $billable
	 * @param null|int $duration
	 * @param null|bool $customTaskIds If you want to reference a task by it's custom task id, this value must be `true`.
	 * @param null|float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`
	 */
	public function __construct(
		protected float|int|null $teamId = null,
		protected float|int $timerId,
		protected ?string $description = null,
		protected array $tags,
		protected ?string $tagAction = null,
		protected ?int $start = null,
		protected ?int $end = null,
		protected string $tid,
		protected ?bool $billable = null,
		protected ?int $duration = null,
		protected ?bool $customTaskIds = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'description' => $this->description,
			'tags' => $this->tags,
			'tag_action' => $this->tagAction,
			'start' => $this->start,
			'end' => $this->end,
			'tid' => $this->tid,
			'billable' => $this->billable,
			'duration' => $this->duration,
		]);
	}


	public function defaultQuery(): array
	{
		return array_filter(['custom_task_ids' => $this->customTaskIds, 'team_id' => $this->teamId]);
	}
}
