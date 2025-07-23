<?php

namespace ClickUp\V2\Requests\Tasks;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * mergeTasks
 *
 * Merge multiple tasks into a target task. The target task is specified by the task_id parameter,
 * while the source tasks to be merged are provided in the request body. Custom Task IDs are not
 * supported.
 */
class MergeTasks extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/task/{$this->taskId}/merge";
	}


	/**
	 * @param string $taskId ID of the target task that other tasks will be merged into.
	 */
	public function __construct(
		protected string $taskId,
	) {
	}
}
