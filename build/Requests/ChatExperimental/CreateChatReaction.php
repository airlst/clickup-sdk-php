<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\ChatExperimental;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createChatReaction.
 *
 * This endpoint creates a message reaction using lower case emoji names.
 */
class CreateChatReaction extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param int    $workspaceId the ID of the Workspace
     * @param string $messageId   The ID of the specified message
     * @param string $reaction    the name of the emoji to use for the reaction
     */
    public function __construct(
        protected int $workspaceId,
        protected string $messageId,
        protected string $reaction,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/chat/messages/{$this->messageId}/reactions";
    }

    public function defaultBody(): array
    {
        return ['reaction' => $this->reaction];
    }
}
