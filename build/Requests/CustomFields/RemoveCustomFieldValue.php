<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\CustomFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * RemoveCustomFieldValue.
 *
 * Remove the data from a Custom Field on a task. This does not delete the option from the Custom
 * Field.
 */
class RemoveCustomFieldValue extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param string         $fieldId       b8a8-48d8-a0c6-b4200788a683 (uuid)
     * @param bool|null      $customTaskIds if you want to reference a task by it's custom task id, this value must be `true`
     * @param float|int|null $teamId        When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
     *                                      \
     *                                      For example: `custom_task_ids=true&team_id=123`.
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
        return array_filter(['custom_task_ids' => $this->customTaskIds, 'team_id' => $this->teamId]);
    }
}
