<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\TimeTracking;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Gettimeentryhistory.
 *
 * View a list of changes made to a time entry.
 */
class Gettimeentryhistory extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param float|int $teamId  Workspace ID
     * @param string    $timerId The ID of a time entry. \
     *                           \
     *                           This can be found using the [Get Time Entries Within a Date Range](ref:gettimeentrieswithinadaterange) endpoint.
     */
    public function __construct(
        protected float|int $teamId,
        protected string $timerId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/time_entries/{$this->timerId}/history";
    }
}
