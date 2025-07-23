<?php

namespace ClickUp\V2\Requests\Goals;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteGoal
 *
 * Remove a Goal from your Workspace.
 */
class DeleteGoal extends Request
{
	protected Method $method = Method::DELETE;


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
