<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Tags;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateSpaceTag.
 *
 * Add a new task Tag to a Space.
 */
class CreateSpaceTag extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected float|int $spaceId,
        protected array $tag,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/space/{$this->spaceId}/tag";
    }

    public function defaultBody(): array
    {
        return ['tag' => $this->tag];
    }
}
