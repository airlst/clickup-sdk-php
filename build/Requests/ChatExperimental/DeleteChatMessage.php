<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\ChatExperimental;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteChatMessage.
 *
 * This endpoint deletes a message.
 */
class DeleteChatMessage extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param int    $workspaceId the ID of the Workspace
     * @param string $messageId   The ID of the specified message
     */
    public function __construct(
        protected int $workspaceId,
        protected string $messageId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/chat/messages/{$this->messageId}";
    }
}
