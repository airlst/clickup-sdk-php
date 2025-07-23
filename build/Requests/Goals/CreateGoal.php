<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Goals;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateGoal.
 *
 * Add a new Goal to a Workspace.
 */
class CreateGoal extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param float|int $teamId Workspace ID
     * @param array     $owners array of user IDs
     */
    public function __construct(
        protected float|int $teamId,
        protected string $name,
        protected int $dueDate,
        protected string $description,
        protected bool $multipleOwners,
        protected array $owners,
        protected string $color,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/team/{$this->teamId}/goal";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'due_date' => $this->dueDate,
            'description' => $this->description,
            'multiple_owners' => $this->multipleOwners,
            'owners' => $this->owners,
            'color' => $this->color,
        ]);
    }
}
