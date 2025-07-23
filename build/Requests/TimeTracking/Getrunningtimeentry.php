<?php

namespace ClickUp\V2\Requests\TimeTracking;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Getrunningtimeentry
 *
 * View a time entry that's currently tracking time for the authenticated user. \
 *  \
 * ***Note:** A time
 * entry that has a negative duration means that timer is currently running for that user.*
 */
class Getrunningtimeentry extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/time_entries/current";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param null|float|int $assignee user id
	 */
	public function __construct(
		protected float|int $teamId,
		protected float|int|null $assignee = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['assignee' => $this->assignee]);
	}
}
