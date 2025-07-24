<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Goals;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateGoal.
 *
 * Rename a Goal, set the due date, replace the description, add or remove owners, and set the Goal
 * color.
 */
class UpdateGoal extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param string $goalId    900e-462d-a849-4a216b06d930 (uuid)
     * @param array  $remOwners array of user IDs
     * @param array  $addOwners array of user IDs
     */
    public function __construct(
        protected string $goalId,
        protected string $name,
        protected int $dueDate,
        protected string $description,
        protected array $remOwners,
        protected array $addOwners,
        protected string $color,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/goal/{$this->goalId}";
    }

    public function defaultBody(): array
    {
        return [
            'name' => $this->name,
            'due_date' => $this->dueDate,
            'description' => $this->description,
            'rem_owners' => $this->remOwners,
            'add_owners' => $this->addOwners,
            'color' => $this->color,
        ];
    }
}
