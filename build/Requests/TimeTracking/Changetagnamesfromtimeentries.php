<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\TimeTracking;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Changetagnamesfromtimeentries.
 *
 * Rename an time entry label.
 */
class Changetagnamesfromtimeentries extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param float|int $teamId Workspace ID
     */
    public function __construct(
        protected float|int $teamId,
        protected string $name,
        protected string $newName,
        protected string $tagBg,
        protected string $tagFg,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/time_entries/tags";
    }

    public function defaultBody(): array
    {
        return ['name' => $this->name, 'new_name' => $this->newName, 'tag_bg' => $this->tagBg, 'tag_fg' => $this->tagFg];
    }
}
