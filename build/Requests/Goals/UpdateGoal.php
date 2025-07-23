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
	 */
	public function __construct(
		protected string $goalId,
	) {
	}
}
