<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\ChatExperimental;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteChatChannel.
 *
 * This endpoint deletes a Channel. Applies to Channels tied to a Space, Folder, or List or not tied to
 * locations.
 */
class DeleteChatChannel extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param int    $workspaceId the ID of the Workspace
     * @param string $channelId   the ID of the specified Channel
     */
    public function __construct(
        protected int $workspaceId,
        protected string $channelId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/chat/channels/{$this->channelId}";
    }
}
