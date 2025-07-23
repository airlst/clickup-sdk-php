<?php

namespace ClickUp\V2\Requests\Tasks;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetTask
 *
 * View information about a task. You can only view task information of tasks you can access. \
 *
 * \
 * Tasks with attachments will return an "attachments" response. \
 *  \
 * Docs attached to a task are not
 * returned.
 */
class GetTask extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/task/{$this->taskId}";
	}


	/**
	 * @param string $taskId
	 * @param null|float|int $teamId When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
	 *  \
	 * For example: `custom_task_ids=true&team_id=123`.
	 * @param null|bool $includeSubtasks Include subtasks, default false
	 * @param null|bool $includeMarkdownDescription To return task descriptions in Markdown format, use `?include_markdown_description=true`.
	 * @param null|array $customFields Include tasks with specific values in one or more Custom Fields. Custom Relationships are included.\
	 *  \
	 * For example: `?custom_fields=[{"field_id":"abcdefghi12345678","operator":"=","value":"1234"},{"field_id":"jklmnop123456","operator":"<","value":"5"}]`\
	 *  \
	 * Only set Custom Field values display in the `value` property of the `custom_fields` parameter. If you want to include tasks with specific values in only one Custom Field, use `custom_field` instead.\
	 *  \
	 * Learn more about [filtering using Custom Fields.](doc:filtertasks)
	 */
	public function __construct(
		protected string $taskId,
		protected float|int|null $teamId = null,
		protected ?bool $includeSubtasks = null,
		protected ?bool $includeMarkdownDescription = null,
		protected ?array $customFields = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'team_id' => $this->teamId,
			'include_subtasks' => $this->includeSubtasks,
			'include_markdown_description' => $this->includeMarkdownDescription,
			'custom_fields' => $this->customFields,
		]);
	}
}
