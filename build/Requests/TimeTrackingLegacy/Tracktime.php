<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\TimeTrackingLegacy;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * Tracktime.
 *
 * ***Note:** This is a legacy time tracking endpoint. We recommend using the Time Tracking API
 * endpoints to manage time entries.*
 */
class Tracktime extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param bool|null      $customTaskIds if you want to reference a task by it's custom task id, this value must be `true`
     * @param float|int|null $teamId        When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
     *                                      \
     *                                      For example: `custom_task_ids=true&team_id=123`.
     */
    public function __construct(
        protected string $taskId,
        protected int $start,
        protected int $end,
        protected int $time,
        protected ?bool $customTaskIds = null,
        protected float|int|null $teamId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/task/{$this->taskId}/time";
    }

    public function defaultBody(): array
    {
        return ['start' => $this->start, 'end' => $this->end, 'time' => $this->time];
    }

    protected function defaultQuery(): array
    {
        return array_filter(['custom_task_ids' => $this->customTaskIds, 'team_id' => $this->teamId], fn (mixed $value): bool => ! is_null($value));
    }
}
