<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Views;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateView.
 *
 * Rename a view, update the grouping, sorting, filters, columns, and settings of a view.
 */
class UpdateView extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param array $parent  The parent parameter specifies where the view is located in the ClickUp Hierarchy. Both `id` and `type` are required. \
     *                       \
     *                       The `id` is the id of the Workspace, Space, Folder, or List where the view is located. \
     *                       \
     *                       The `type` value indciates the level of the Hierarchy where the view is located.
     * @param array $columns Custom Fields added to a view at the Everything level will be added to all tasks in your Workspace. Once Custom Fields are added to one of these views, you cannot move it to another level of the Hierarchy.
     */
    public function __construct(
        protected string $viewId,
        protected string $name,
        protected string $type,
        protected array $parent,
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
        return "/v2/view/{$this->viewId}";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'type' => $this->type,
            'parent' => $this->parent,
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
