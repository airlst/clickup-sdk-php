<?php

namespace ClickUp\V2\Requests\Goals;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateGoal
 *
 * Add a new Goal to a Workspace.
 */
class CreateGoal extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/goal";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function __construct(
		protected float|int $teamId,
	) {
	}
}
