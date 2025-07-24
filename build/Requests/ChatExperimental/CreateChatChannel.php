<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\ChatExperimental;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * createChatChannel.
 *
 * This endpoint creates a new Channel not tied to a Space, Folder, or List. If a Channel with the
 * specified name already exists it returns it.
 */
class CreateChatChannel extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param int         $workspaceId the ID of the Workspace
     * @param string      $name        the name for the Channel being created
     * @param string|null $description the description for the Channel being created
     * @param string|null $topic       the topic of the Channel being created
     * @param array|null  $userIds     optionally specify unique user IDs, up to 100
     * @param string|null $visibility  The visibility of the Channel being created. If not specified, the Channel is PUBLIC.
     */
    public function __construct(
        protected int $workspaceId,
        protected string $name,
        protected ?string $description = null,
        protected ?string $topic = null,
        protected ?array $userIds = null,
        protected ?string $visibility = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/chat/channels";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'description' => $this->description,
            'topic' => $this->topic,
            'user_ids' => $this->userIds,
            'visibility' => $this->visibility,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
