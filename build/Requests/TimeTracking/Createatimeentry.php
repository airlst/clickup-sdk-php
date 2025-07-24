<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\TimeTracking;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * Createatimeentry.
 *
 * Create a time entry. \
 *  \
 * ***Note:** A time entry that has a negative duration means that timer is
 * currently running for that user.*
 */
class Createatimeentry extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param float|int  $teamId        Workspace ID
     * @param int        $duration      When there are values for both `start` and `end`, `duration` is ignored. The `stop` parameter can be used instead of the `duration` parameter.
     * @param array|null $tags          users on the Business Plan and above can include a time tracking label
     * @param int|null   $stop          the `duration` parameter can be used instead of the `stop` parameter
     * @param int|null   $assignee      Workspace owners and admins can include any user id. Workspace members can only include their own user id.
     * @param bool|null  $customTaskIds if you want to reference a task by it's custom task id, this value must be `true`
     */
    public function __construct(
        protected float|int $teamId,
        protected int $start,
        protected int $duration,
        protected ?string $description = null,
        protected ?array $tags = null,
        protected ?int $stop = null,
        protected ?int $end = null,
        protected ?bool $billable = null,
        protected ?int $assignee = null,
        protected ?string $tid = null,
        protected ?bool $customTaskIds = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/time_entries";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'start' => $this->start,
            'duration' => $this->duration,
            'description' => $this->description,
            'tags' => $this->tags,
            'stop' => $this->stop,
            'end' => $this->end,
            'billable' => $this->billable,
            'assignee' => $this->assignee,
            'tid' => $this->tid,
        ], fn (mixed $value): bool => ! is_null($value));
    }

    protected function defaultQuery(): array
    {
        return array_filter(['custom_task_ids' => $this->customTaskIds], fn (mixed $value): bool => ! is_null($value));
    }
}
