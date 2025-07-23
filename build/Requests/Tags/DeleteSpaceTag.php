<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Tags;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteSpaceTag.
 *
 * Delete a task Tag from a Space.
 */
class DeleteSpaceTag extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected float|int $spaceId,
        protected string $tagName,
        protected array $tag,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/space/{$this->spaceId}/tag/{$this->tagName}";
    }

    public function defaultBody(): array
    {
        return array_filter(['tag' => $this->tag]);
    }
}
