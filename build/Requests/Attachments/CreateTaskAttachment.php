<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Attachments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * CreateTaskAttachment.
 *
 * Upload a file to a task as an attachment. Files stored in the cloud cannot be used in this API
 * request.\
 *  \
 * ***Note:** This request uses multipart/form-data as the content type.*
 */
class CreateTaskAttachment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param bool|null      $customTaskIds if you want to reference a task by its custom task id, this value must be `true`
     * @param float|int|null $teamId        When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
     *                                      \
     *                                      For example: `custom_task_ids=true&team_id=123`.
     */
    public function __construct(
        protected string $taskId,
        protected ?array $attachment = null,
        protected ?bool $customTaskIds = null,
        protected float|int|null $teamId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/task/{$this->taskId}/attachment";
    }

    public function defaultBody(): array
    {
        return array_filter(['attachment' => $this->attachment], fn (mixed $value): bool => ! is_null($value));
    }

    protected function defaultQuery(): array
    {
        return array_filter(['custom_task_ids' => $this->customTaskIds, 'team_id' => $this->teamId], fn (mixed $value): bool => ! is_null($value));
    }
}
