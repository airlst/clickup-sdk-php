<?php

namespace ClickUp\V2\Requests\Goals;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetGoal
 *
 * View the details of a Goal including its Targets.
 */
class GetGoal extends Request
{
	protected Method $method = Method::GET;


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
