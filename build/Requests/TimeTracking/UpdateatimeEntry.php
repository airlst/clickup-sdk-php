<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\TimeTracking;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * UpdateatimeEntry.
 *
 * Update the details of a time entry.
 */
class UpdateatimeEntry extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param float|int $teamId        Workspace ID
     * @param array     $tags          users on the Business Plan and above can include a time tracking label
     * @param int|null  $start         when providing `start`, you must also provide `end`
     * @param int|null  $end           when providing `end`, you must also provide `start`
     * @param bool|null $customTaskIds if you want to reference a task by it's custom task id, this value must be `true`
     */
    public function __construct(
        protected float|int $teamId,
        protected float|int $timerId,
        protected array $tags,
        protected string $tid,
        protected ?string $description = null,
        protected ?string $tagAction = null,
        protected ?int $start = null,
        protected ?int $end = null,
        protected ?bool $billable = null,
        protected ?int $duration = null,
        protected ?bool $customTaskIds = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/time_entries/{$this->timerId}";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'tags' => $this->tags,
            'tid' => $this->tid,
            'description' => $this->description,
            'tag_action' => $this->tagAction,
            'start' => $this->start,
            'end' => $this->end,
            'billable' => $this->billable,
            'duration' => $this->duration,
        ], fn (mixed $value): bool => ! is_null($value));
    }

    protected function defaultQuery(): array
    {
        return array_filter(['custom_task_ids' => $this->customTaskIds], fn (mixed $value): bool => ! is_null($value));
    }
}
