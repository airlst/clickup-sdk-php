<?php

namespace ClickUp\V2\Requests\TimeTracking;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Getalltagsfromtimeentries
 *
 * View all the labels that have been applied to time entries in a Workspace.
 */
class Getalltagsfromtimeentries extends Request
{
	protected Method $method = Method::GET;


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
