<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\TaskChecklists;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * CreateChecklistItem.
 *
 * Add a line item to a task checklist.
 */
class CreateChecklistItem extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param string $checklistId b8a8-48d8-a0c6-b4200788a683 (uuid)
     */
    public function __construct(
        protected string $checklistId,
        protected ?string $name = null,
        protected ?int $assignee = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/checklist/{$this->checklistId}/checklist_item";
    }

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name, 'assignee' => $this->assignee], fn (mixed $value): bool => ! is_null($value));
    }
}
