<?php

namespace ClickUp\V2\Requests\CustomFields;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * SetCustomFieldValue
 *
 * Add data to a Custom field on a task. \
 *  \
 * You'll need to know the `task_id` of the task you want to
 * update, and the universal unique identifier (UUID) `field_id` of the Custom Field you want to set.
 * \
 *  \
 * You can use [Get Accessible Custom Fields](ref:getaccessiblecustomfields) or the [Get
 * Task](ref:gettask) endpoint to find the `field_id`.
 */
class SetCustomFieldValue extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/task/{$this->taskId}/field/{$this->fieldId}";
	}


	/**
	 * @param string $taskId Enter the task ID of the task you want to update.
	 * @param string $fieldId Enter the universal unique identifier (UUID) of the Custom Field you want to set.
	 * @param null|bool $customTaskIds If you want to reference a task by its Custom Task ID, this value must be `true`.
	 * @param null|float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 */
	public function __construct(
		protected string $taskId,
		protected string $fieldId,
		protected ?bool $customTaskIds = null,
		protected float|int|null $teamId = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['custom_task_ids' => $this->customTaskIds, 'team_id' => $this->teamId]);
	}
}
