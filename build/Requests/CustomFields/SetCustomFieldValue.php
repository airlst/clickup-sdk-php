<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\CustomFields;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * SetCustomFieldValue.
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

    /**
     * @param string         $taskId        enter the task ID of the task you want to update
     * @param string         $fieldId       enter the universal unique identifier (UUID) of the Custom Field you want to set
     * @param bool|null      $customTaskIds if you want to reference a task by its Custom Task ID, this value must be `true`
     * @param float|int|null $teamId        When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
     *
     *  \
     * For example: `custom_task_ids=true&team_id=123`.
     */
    public function __construct(
        protected string $taskId,
        protected string $fieldId,
        protected ?bool $customTaskIds = null,
        protected float|int|null $teamId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/task/{$this->taskId}/field/{$this->fieldId}";
    }

    protected function defaultQuery(): array
    {
        return array_filter(['custom_task_ids' => $this->customTaskIds, 'team_id' => $this->teamId], fn (mixed $value): bool => ! is_null($value));
    }
}
