<?php

namespace ClickUp\V2\Requests\TimeTracking;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteatimeEntry
 *
 * Delete a time entry from a Workspace.
 */
class DeleteatimeEntry extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/time_entries/{$this->timerId}";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param float|int $timerId Array of timer ids to delete separated by commas
	 */
	public function __construct(
		protected float|int $teamId,
		protected float|int $timerId,
	) {
	}
}
