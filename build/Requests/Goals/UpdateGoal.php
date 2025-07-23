<?php

namespace ClickUp\V2\Requests\Goals;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateGoal
 *
 * Rename a Goal, set the due date, replace the description, add or remove owners, and set the Goal
 * color.
 */
class UpdateGoal extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/v2/goal/{$this->goalId}";
	}


	/**
	 * @param string $goalId 900e-462d-a849-4a216b06d930 (uuid)
	 * @param string $name
	 * @param int $dueDate
	 * @param string $description
	 * @param array $remOwners Array of user IDs.
	 * @param array $addOwners Array of user IDs.
	 * @param string $color
	 */
	public function __construct(
		protected string $goalId,
		protected string $name,
		protected int $dueDate,
		protected string $description,
		protected array $remOwners,
		protected array $addOwners,
		protected string $color,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'name' => $this->name,
			'due_date' => $this->dueDate,
			'description' => $this->description,
			'rem_owners' => $this->remOwners,
			'add_owners' => $this->addOwners,
			'color' => $this->color,
		]);
	}
}
