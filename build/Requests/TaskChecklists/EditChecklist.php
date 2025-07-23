<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\TaskChecklists;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * EditChecklist.
 *
 * Rename a task checklist, or reorder a checklist so it appears above or below other checklists on a
 * task.
 */
class EditChecklist extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param string   $checklistId b8a8-48d8-a0c6-b4200788a683 (uuid)
     * @param int|null $position    Position refers to the order of appearance of checklists on a task.\
     *                              \
     *                              To set a checklist to appear at the top of the checklists section of a task, use `"position": 0`.
     */
    public function __construct(
        protected string $checklistId,
        protected ?string $name = null,
        protected ?int $position = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/checklist/{$this->checklistId}";
    }

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name, 'position' => $this->position]);
    }
}
