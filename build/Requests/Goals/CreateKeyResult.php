<?php

namespace ClickUp\V2\Requests\Goals;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateKeyResult
 *
 * Add a Target to a Goal.
 */
class CreateKeyResult extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/goal/{$this->goalId}/key_result";
	}


	/**
	 * @param string $goalId 900e-462d-a849-4a216b06d930 (uuid)
	 * @param string $name
	 * @param array $owners
	 * @param string $type Target (key result) types include: `number`, `currency`, `boolean`, `percentage`, or `automatic`.
	 * @param int $stepsStart
	 * @param int $stepsEnd
	 * @param string $unit
	 * @param array $taskIds Enter an array of task IDs to link this target with one or more tasks.
	 * @param array $listIds Enter an array of List IDs to link this target with one or more Lists.
	 */
	public function __construct(
		protected string $goalId,
		protected string $name,
		protected array $owners,
		protected string $type,
		protected int $stepsStart,
		protected int $stepsEnd,
		protected string $unit,
		protected array $taskIds,
		protected array $listIds,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'name' => $this->name,
			'owners' => $this->owners,
			'type' => $this->type,
			'steps_start' => $this->stepsStart,
			'steps_end' => $this->stepsEnd,
			'unit' => $this->unit,
			'task_ids' => $this->taskIds,
			'list_ids' => $this->listIds,
		]);
	}
}
