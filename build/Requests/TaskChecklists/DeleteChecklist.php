<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\TaskChecklists;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteChecklist.
 *
 * Delete a checklist from a task.
 */
class DeleteChecklist extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param string $checklistId b8a8-48d8-a0c6-b4200788a683 (uuid)
     */
    public function __construct(
        protected string $checklistId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/checklist/{$this->checklistId}";
    }
}
