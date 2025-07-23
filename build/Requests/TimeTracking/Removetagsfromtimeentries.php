<?php

namespace ClickUp\V2\Requests\TimeTracking;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Removetagsfromtimeentries
 *
 * Remove labels from time entries. This does not remove the label from a Workspace.
 */
class Removetagsfromtimeentries extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/time_entries/tags";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param array $timeEntryIds
	 * @param array $tags
	 */
	public function __construct(
		protected float|int $teamId,
		protected array $timeEntryIds,
		protected array $tags,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['time_entry_ids' => $this->timeEntryIds, 'tags' => $this->tags]);
	}
}
