<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Lists;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * CreateList.
 *
 * Add a new List to a Folder.
 */
class CreateList extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param string|null $markdownContent use `markdown_content` instead of `content` to format your List description
     * @param int|null    $assignee        include a `user_id` to assign this List
     * @param string|null $status          **Status** refers to the List color rather than the task Statuses available in the List
     */
    public function __construct(
        protected float|int $folderId,
        protected string $name,
        protected ?string $content = null,
        protected ?string $markdownContent = null,
        protected ?int $dueDate = null,
        protected ?bool $dueDateTime = null,
        protected ?int $priority = null,
        protected ?int $assignee = null,
        protected ?string $status = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/folder/{$this->folderId}/list";
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
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
