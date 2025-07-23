<?php

namespace ClickUp\V2\Requests\TaskChecklists;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * EditChecklistItem
 *
 * Update an individual line item in a task checklist. \
 *  \
 * You can rename it, set the assignee, mark
 * it as resolved, or nest it under another checklist item.
 */
class EditChecklistItem extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/v2/checklist/{$this->checklistId}/checklist_item/{$this->checklistItemId}";
	}


	/**
	 * @param string $checklistId b8a8-48d8-a0c6-b4200788a683 (uuid)
	 * @param string $checklistItemId e491-47f5-9fd8-d1dc4cedcc6f (uuid)
	 */
	public function __construct(
		protected string $checklistId,
		protected string $checklistItemId,
	) {
	}
}
