<?php

namespace ClickUp\V2\Requests\TimeTracking;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Getsingulartimeentry
 *
 * View a single time entry. \
 *  \
 * ***Note:** A time entry that has a negative duration means that timer
 * is currently running for that user.*
 */
class Getsingulartimeentry extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/time_entries/{$this->timerId}";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param string $timerId The ID of a time entry. \
	 *  \
	 * This can be found using the [Get Time Entries Within a Date Range](ref:gettimeentrieswithinadaterange) endpoint.
	 * @param null|bool $includeTaskTags Include task tags in the response for time entries associated with tasks.
	 * @param null|bool $includeLocationNames Include the names of the List, Folder, and Space along with `list_id`,`folder_id`, and `space_id`.
	 * @param null|bool $includeApprovalHistory Include the history of the approval for the time entry.
	 * @param null|bool $includeApprovalDetails Include the details of the approval for the time entry.
	 */
	public function __construct(
		protected float|int $teamId,
		protected string $timerId,
		protected ?bool $includeTaskTags = null,
		protected ?bool $includeLocationNames = null,
		protected ?bool $includeApprovalHistory = null,
		protected ?bool $includeApprovalDetails = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'include_task_tags' => $this->includeTaskTags,
			'include_location_names' => $this->includeLocationNames,
			'include_approval_history' => $this->includeApprovalHistory,
			'include_approval_details' => $this->includeApprovalDetails,
		]);
	}
}
