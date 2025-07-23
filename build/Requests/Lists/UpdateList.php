<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Lists;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateList.
 *
 * Rename a List, update the List Info description, set a due date/time, set the List's priority, set
 * an assignee, set or remove the List color.
 */
class UpdateList extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param string|null $markdownContent use `markdown_content` instead of `content` to format your List description
     * @param string|null $status          **Status** refers to the List color rather than the task Statuses available in the List
     * @param bool|null   $unsetStatus     By default, this is `false.` To remove the List color use `unset_status: true`.
     */
    public function __construct(
        protected string $listId,
        protected string $name,
        protected ?string $content = null,
        protected ?string $markdownContent = null,
        protected ?int $dueDate = null,
        protected ?bool $dueDateTime = null,
        protected ?int $priority = null,
        protected ?string $assignee = null,
        protected ?string $status = null,
        protected ?bool $unsetStatus = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/list/{$this->listId}";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'content' => $this->content,
            'markdown_content' => $this->markdownContent,
            'due_date' => $this->dueDate,
            'due_date_time' => $this->dueDateTime,
            'priority' => $this->priority,
            'assignee' => $this->assignee,
            'status' => $this->status,
            'unset_status' => $this->unsetStatus,
        ]);
    }
}
