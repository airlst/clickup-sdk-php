<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\TimeTracking;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Getalltagsfromtimeentries.
 *
 * View all the labels that have been applied to time entries in a Workspace.
 */
class Getalltagsfromtimeentries extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param float|int $teamId Workspace ID
     */
    public function __construct(
        protected float|int $teamId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/time_entries/tags";
    }
}
