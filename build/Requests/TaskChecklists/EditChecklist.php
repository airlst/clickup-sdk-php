<?php

namespace ClickUp\V2\Requests\TaskChecklists;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * EditChecklist
 *
 * Rename a task checklist, or reorder a checklist so it appears above or below other checklists on a
 * task.
 */
class EditChecklist extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/v2/checklist/{$this->checklistId}";
	}


	/**
	 * @param string $checklistId b8a8-48d8-a0c6-b4200788a683 (uuid)
	 */
	public function __construct(
		protected string $checklistId,
	) {
	}
}
