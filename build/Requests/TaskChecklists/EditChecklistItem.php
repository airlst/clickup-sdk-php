<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\TaskChecklists;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * EditChecklistItem.
 *
 * Update an individual line item in a task checklist. \
 *  \
 * You can rename it, set the assignee, mark
 * it as resolved, or nest it under another checklist item.
 */
class EditChecklistItem extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param string     $checklistId     b8a8-48d8-a0c6-b4200788a683 (uuid)
     * @param string     $checklistItemId e491-47f5-9fd8-d1dc4cedcc6f (uuid)
     * @param mixed|null $parent          to nest a checklist item under another checklist item, include the other item's `checklist_item_id`
     */
    public function __construct(
        protected string $checklistId,
        protected string $checklistItemId,
        protected ?string $name = null,
        protected mixed $assignee = null,
        protected ?bool $resolved = null,
        protected mixed $parent = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/checklist/{$this->checklistId}/checklist_item/{$this->checklistItemId}";
    }

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name, 'assignee' => $this->assignee, 'resolved' => $this->resolved, 'parent' => $this->parent], fn (mixed $value): bool => ! is_null($value));
    }
}
