<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Spaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateSpace.
 *
 * Rename, set the Space color, and enable ClickApps for a Space.
 */
class UpdateSpace extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param bool $adminCanManage ***Note:** Allowing or restricting admins from managing private Spaces using `"admin_can_manage"` is an [Enterprise Plan](https://clickup.com/pricing) feature.*
     */
    public function __construct(
        protected float|int $spaceId,
        protected string $name,
        protected string $color,
        protected bool $private,
        protected bool $adminCanManage,
        protected bool $multipleAssignees,
        protected array $features,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/space/{$this->spaceId}";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'color' => $this->color,
            'private' => $this->private,
            'admin_can_manage' => $this->adminCanManage,
            'multiple_assignees' => $this->multipleAssignees,
            'features' => $this->features,
        ]);
    }
}
