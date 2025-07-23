<?php

namespace ClickUp\V2\Requests\Tasks;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetTasks
 *
 * View the tasks in a List. Responses are limited to 100 tasks per page. You can only view task
 * information of tasks you can access. \
 *  \
 * This endpoint only includes tasks where the specified
 * `list_id` is their home List. Tasks added to the `list_id` with a different home List are not
 * included in the response.
 */
class GetTasks extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/list/{$this->listId}/task";
	}


	/**
	 * @param float|int $listId To find the list_id: \ 1. In the Sidebar, hover over the List and click the **ellipsis ...** menu. \ 2. Select **Copy link.** \ 3. Use the copied URL to find the list_id. The list_id is the number that follows /li in the URL.
	 * @param null|bool $archived
	 * @param null|bool $includeMarkdownDescription To return task descriptions in Markdown format, use `?include_markdown_description=true`.
	 * @param null|int $page Page to fetch (starts at 0).
	 * @param null|string $orderBy Order by a particular field. By default, tasks are ordered by `created`.\
	 *  \
	 * Options include: `id`, `created`, `updated`, and `due_date`.
	 * @param null|bool $reverse Tasks are displayed in reverse order.
	 * @param null|bool $subtasks Include or exclude subtasks. By default, subtasks are excluded.
	 * @param null|array $statuses Filter by statuses. To include closed tasks, use the `include_closed` parameter. \
	 *  \
	 * For example: \
	 *  \
	 * `?statuses[]=to%20do&statuses[]=in%20progress`
	 * @param null|bool $includeClosed Include or excluse closed tasks. By default, they are excluded.\
	 *  \
	 * To include closed tasks, use `include_closed: true`.
	 * @param null|array $assignees Filter by Assignees. For example: \
	 *  \
	 * `?assignees[]=1234&assignees[]=5678`
	 * @param null|array $watchers Filter by watchers.
	 * @param null|array $tags Filter by tags. For example: \
	 *  \
	 * `?tags[]=tag1&tags[]=this%20tag`
	 * @param null|int $dueDateGt Filter by due date greater than Unix time in milliseconds.
	 * @param null|int $dueDateLt Filter by due date less than Unix time in milliseconds.
	 * @param null|int $dateCreatedGt Filter by date created greater than Unix time in milliseconds.
	 * @param null|int $dateCreatedLt Filter by date created less than Unix time in milliseconds.
	 * @param null|int $dateUpdatedGt Filter by date updated greater than Unix time in milliseconds.
	 * @param null|int $dateUpdatedLt Filter by date updated less than Unix time in milliseconds.
	 * @param null|int $dateDoneGt Filter by date done greater than Unix time in milliseconds.
	 * @param null|int $dateDoneLt Filter by date done less than Unix time in milliseconds.
	 * @param null|array $customFields Include tasks with specific values in one or more Custom Fields. Custom Relationships are included.\
	 *  \
	 * For example: `?custom_fields=[{"field_id":"abcdefghi12345678","operator":"=","value":"1234"},{"field_id":"jklmnop123456","operator":"<","value":"5"}]`\
	 *  \
	 * Only set Custom Field values display in the `value` property of the `custom_fields` parameter. If you want to include tasks with specific values in only one Custom Field, use `custom_field` instead.\
	 *  \
	 * Learn more about [filtering using Custom Fields.](doc:taskfilters)
	 * @param null|array $customField Include tasks with specific values in only one Custom Field. This Custom Field can be a Custom Relationship.
	 * @param null|array $customItems Filter by custom task types. For example: \
	 *  \
	 * `?custom_items[]=0&custom_items[]=1300` \
	 *  \
	 * Including `0` returns tasks. Including `1` returns Milestones. Including any other number returns the custom task type as defined in your Workspace.
	 */
	public function __construct(
		protected float|int $listId,
		protected ?bool $archived = null,
		protected ?bool $includeMarkdownDescription = null,
		protected ?int $page = null,
		protected ?string $orderBy = null,
		protected ?bool $reverse = null,
		protected ?bool $subtasks = null,
		protected ?array $statuses = null,
		protected ?bool $includeClosed = null,
		protected ?array $assignees = null,
		protected ?array $watchers = null,
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
		protected ?array $customField = null,
		protected ?array $customItems = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'archived' => $this->archived,
			'include_markdown_description' => $this->includeMarkdownDescription,
			'page' => $this->page,
			'order_by' => $this->orderBy,
			'reverse' => $this->reverse,
			'subtasks' => $this->subtasks,
			'statuses' => $this->statuses,
			'include_closed' => $this->includeClosed,
			'assignees' => $this->assignees,
			'watchers' => $this->watchers,
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
			'custom_field' => $this->customField,
			'custom_items' => $this->customItems,
		]);
	}
}
