<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Folders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateFolder.
 *
 * Add a new Folder to a Space.
 */
class CreateFolder extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected float|int $spaceId,
        protected string $name,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/space/{$this->spaceId}/folder";
    }

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name]);
    }
}
