<?php

namespace ClickUp\V2\Requests\TimeTracking;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Addtagsfromtimeentries
 *
 * Add a label to a time entry.
 */
class Addtagsfromtimeentries extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/time_entries/tags";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function __construct(
		protected float|int $teamId,
	) {
	}
}
