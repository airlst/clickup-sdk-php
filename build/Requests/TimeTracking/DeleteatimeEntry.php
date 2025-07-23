<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\TimeTracking;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteatimeEntry.
 *
 * Delete a time entry from a Workspace.
 */
class DeleteatimeEntry extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param float|int $teamId  Workspace ID
     * @param float|int $timerId Array of timer ids to delete separated by commas
     */
    public function __construct(
        protected float|int $teamId,
        protected float|int $timerId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/time_entries/{$this->timerId}";
    }
}
