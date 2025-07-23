<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\TimeTracking;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * StartatimeEntry.
 *
 * Start a timer for the authenticated user.
 */
class StartatimeEntry extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param float|int  $teamId        Workspace ID
     * @param array|null $tags          users on the Business Plan and above can include a time tracking label
     * @param bool|null  $customTaskIds if you want to reference a task by it's custom task id, this value must be `true`
     */
    public function __construct(
        protected float|int $teamId,
        protected ?string $description = null,
        protected ?array $tags = null,
        protected ?string $tid = null,
        protected ?bool $billable = null,
        protected ?bool $customTaskIds = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/time_entries/start";
    }

    public function defaultBody(): array
    {
        return array_filter(['description' => $this->description, 'tags' => $this->tags, 'tid' => $this->tid, 'billable' => $this->billable]);
    }

    protected function defaultQuery(): array
    {
        return array_filter(['custom_task_ids' => $this->customTaskIds]);
    }
}
