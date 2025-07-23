<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\ChatExperimental;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createLocationChatChannel.
 *
 * This endpoint creates a Channel and when a Channel already exists on the requested location, it
 * returns it.
 */
class CreateLocationChatChannel extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param int         $workspaceId the ID of the Workspace
     * @param mixed       $location    The location of the Channel: Space, Folder, or List
     * @param string|null $description the description for the Channel being created
     * @param string|null $topic       the topic of the Channel being created
     * @param array|null  $userIds     optionally specify unique user IDs, up to 100
     * @param string|null $visibility  The visibility of the Channel being created. If not specified, the Channel is PUBLIC.
     */
    public function __construct(
        protected int $workspaceId,
        protected mixed $location,
        protected ?string $description = null,
        protected ?string $topic = null,
        protected ?array $userIds = null,
        protected ?string $visibility = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/chat/channels/location";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'location' => $this->location,
            'description' => $this->description,
            'topic' => $this->topic,
            'user_ids' => $this->userIds,
            'visibility' => $this->visibility,
        ]);
    }
}
