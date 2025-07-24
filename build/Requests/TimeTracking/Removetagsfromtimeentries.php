<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\TimeTracking;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Removetagsfromtimeentries.
 *
 * Remove labels from time entries. This does not remove the label from a Workspace.
 */
class Removetagsfromtimeentries extends Request
{
    protected Method $method = Method::DELETE;

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
