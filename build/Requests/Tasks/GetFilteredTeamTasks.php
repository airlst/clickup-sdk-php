<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Tasks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetFilteredTeamTasks.
 *
 * View the tasks that meet specific criteria from a Workspace. Responses are limited to 100 tasks per
 * page.  \
 *  \
 * You can only view task information of tasks you can access. \
 *  \
 *  Our Try It modal
 * currently supports filtering by two or more Lists, Folders, or Spaces. To filter by a single List,
 * Folder, or Space, we recommend using a free app like [Postman](https://www.postman.com/) to test our
 * public API.
 */
class GetFilteredTeamTasks extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param float|int   $teamId                     Workspace ID
     * @param int|null    $page                       page to fetch (starts at 0)
     * @param string|null $orderBy                    Order by a particular field. By default, tasks are ordered by `created`.\
     *                                                \
     *                                                Options include: `id`, `created`, `updated`, and `due_date`.
     * @param bool|null   $reverse                    tasks are displayed in reverse order
     * @param bool|null   $subtasks                   Include or exclude subtasks. By default, subtasks are excluded.
     * @param array|null  $spaceIds                   Filter by Spaces. For example: \
     *                                                \
     *                                                `?space_ids[]=1234&space_ids[]=6789`
     * @param array|null  $projectIds                 Filter by Folders. For example: \
     *                                                \
     *                                                `?project_ids[]=1234&project_ids[]=6789`
     * @param array|null  $listIds                    Filter by Lists. For example: \
     *                                                \
     *                                                `?list_ids[]=1234&list_ids[]=6789`
     * @param array|null  $statuses                   Filter by statuses. Use `%20` to represent a space character. To include closed tasks, use the `include_closed` parameter. \
     *                                                \
     *                                                For example: \
     *                                                \
     *                                                `?statuses[]=to%20do&statuses[]=in%20progress`
     * @param bool|null   $includeClosed              Include or excluse closed tasks. By default, they are excluded.\
     *                                                \
     *                                                To include closed tasks, use `include_closed: true`.
     * @param array|null  $assignees                  Filter by Assignees using people's ClickUp user id. For example: \
     *                                                \
     *                                                `?assignees[]=1234&assignees[]=5678`
     * @param array|null  $tags                       Filter by tags. User `%20` to represent a space character. For example: \
     *                                                \
     *                                                `?tags[]=tag1&tags[]=this%20tag`
     * @param int|null    $dueDateGt                  filter by due date greater than Unix time in milliseconds
     * @param int|null    $dueDateLt                  filter by due date less than Unix time in milliseconds
     * @param int|null    $dateCreatedGt              filter by date created greater than Unix time in milliseconds
     * @param int|null    $dateCreatedLt              filter by date created less than Unix time in milliseconds
     * @param int|null    $dateUpdatedGt              filter by date updated greater than Unix time in milliseconds
     * @param int|null    $dateUpdatedLt              filter by date updated less than Unix time in milliseconds
     * @param int|null    $dateDoneGt                 filter by date done greater than Unix time in milliseconds
     * @param int|null    $dateDoneLt                 filter by date done less than Unix time in milliseconds
     * @param array|null  $customFields               Include tasks with specific values in one or more Custom Fields. Custom Relationships are included.\
     *                                                \
     *                                                For example: `?custom_fields=[{"field_id":"abcdefghi12345678","operator":"=","value":"1234"}{"field_id":"jklmnop123456","operator":"<","value":"5"}]`\
     *                                                \
     *                                                Only set Custom Field values display in the `value` property of the `custom_fields` parameter. The `=` operator isn't supported with Label Custom Fields.\
     *                                                \
     *                                                Learn more about [filtering using Custom Fields.](doc:taskfilters)
     * @param bool|null   $customTaskIds              if you want to reference a task by its custom task id, this value must be `true`
     * @param string|null $parent                     include the parent task ID to return subtasks
     * @param bool|null   $includeMarkdownDescription to return task descriptions in Markdown format, use `?include_markdown_description=true`
     * @param array|null  $customItems                Filter by custom task types. For example: \
     *                                                \
     *                                                `?custom_items[]=0&custom_items[]=1300` \
     *                                                \
     *                                                Including `0` returns tasks. Including `1` returns Milestones. Including any other number returns the custom task type as defined in your Workspace.
     */
    public function __construct(
        protected float|int $teamId,
        protected ?int $page = null,
        protected ?string $orderBy = null,
        protected ?bool $reverse = null,
        protected ?bool $subtasks = null,
        protected ?array $spaceIds = null,
        protected ?array $projectIds = null,
        protected ?array $listIds = null,
        protected ?array $statuses = null,
        protected ?bool $includeClosed = null,
        protected ?array $assignees = null,
        protected ?array $tags = null,
        protected ?int $dueDateGt = null,
        protected ?int $dueDateLt = null,
        protected ?int $dateCreatedGt = null,
        protected ?int $dateCreatedLt = null,
        protected ?int $dateUpdatedGt = null,
        protected ?int $dateUpdatedLt = null,
        protected ?int $dateDoneGt = null,
        protected ?int $dateDoneLt = null,
        protected ?array $customFields = null,
        protected ?bool $customTaskIds = null,
        protected ?string $parent = null,
        protected ?bool $includeMarkdownDescription = null,
        protected ?array $customItems = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/task";
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'page' => $this->page,
            'order_by' => $this->orderBy,
            'reverse' => $this->reverse,
            'subtasks' => $this->subtasks,
            'space_ids' => $this->spaceIds,
            'project_ids' => $this->projectIds,
            'list_ids[]' => $this->listIds,
            'statuses' => $this->statuses,
            'include_closed' => $this->includeClosed,
            'assignees' => $this->assignees,
            'tags' => $this->tags,
            'due_date_gt' => $this->dueDateGt,
            'due_date_lt' => $this->dueDateLt,
            'date_created_gt' => $this->dateCreatedGt,
            'date_created_lt' => $this->dateCreatedLt,
            'date_updated_gt' => $this->dateUpdatedGt,
            'date_updated_lt' => $this->dateUpdatedLt,
            'date_done_gt' => $this->dateDoneGt,
            'date_done_lt' => $this->dateDoneLt,
            'custom_fields' => $this->customFields,
            'custom_task_ids' => $this->customTaskIds,
            'parent' => $this->parent,
            'include_markdown_description' => $this->includeMarkdownDescription,
            'custom_items' => $this->customItems,
        ]);
    }
}
