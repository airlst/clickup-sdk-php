<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\TaskChecklists;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteChecklistItem.
 *
 * Delete a line item from a task checklist.
 */
class DeleteChecklistItem extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param string $checklistId     b8a8-48d8-a0c6-b4200788a683 (uuid)
     * @param string $checklistItemId e491-47f5-9fd8-d1dc4cedcc6f (uuid)
     */
    public function __construct(
        protected string $checklistId,
        protected string $checklistItemId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/checklist/{$this->checklistId}/checklist_item/{$this->checklistItemId}";
    }
}
