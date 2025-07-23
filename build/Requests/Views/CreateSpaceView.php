<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Views;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateSpaceView.
 *
 * Add a List, Board, Calendar, Table, Timeline, Workload, Activity, Map, Chat, or Gantt view to a
 * Space.
 */
class CreateSpaceView extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param string $type    The type of view to create. Options include: `list`, `board`, `calendar`, `table`, `timeline`, `workload`, `activity`, `map`, `conversation`, or `gantt`.
     * @param array  $columns Custom Fields added to a view at the Everything level will be added to all tasks in your Workspace. Once Custom Fields are added to one of these views, you cannot move it to another level of the Hierarchy.
     */
    public function __construct(
        protected float|int $spaceId,
        protected string $name,
        protected string $type,
        protected array $grouping,
        protected array $divide,
        protected array $sorting,
        protected array $filters,
        protected array $columns,
        protected array $teamSidebar,
        protected array $settings,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/space/{$this->spaceId}/view";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'type' => $this->type,
            'grouping' => $this->grouping,
            'divide' => $this->divide,
            'sorting' => $this->sorting,
            'filters' => $this->filters,
            'columns' => $this->columns,
            'team_sidebar' => $this->teamSidebar,
            'settings' => $this->settings,
        ]);
    }
}
