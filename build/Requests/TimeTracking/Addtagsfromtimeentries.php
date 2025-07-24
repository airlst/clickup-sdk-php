<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\TimeTracking;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Addtagsfromtimeentries.
 *
 * Add a label to a time entry.
 */
class Addtagsfromtimeentries extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param float|int $teamId Workspace ID
     */
    public function __construct(
        protected float|int $teamId,
        protected array $timeEntryIds,
        protected array $tags,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/time_entries/tags";
    }

    public function defaultBody(): array
    {
        return ['time_entry_ids' => $this->timeEntryIds, 'tags' => $this->tags];
    }
}
