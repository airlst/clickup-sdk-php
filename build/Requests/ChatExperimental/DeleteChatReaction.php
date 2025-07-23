<?php

namespace ClickUp\V2\Requests\ChatExperimental;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteChatReaction
 *
 * This endpoint deletes a message reaction.
 */
class DeleteChatReaction extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/chat/messages/{$this->messageId}/reactions/{$this->reaction}";
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $messageId The ID of the specified message
	 * @param string $reaction The name of the reaction to be deleted.
	 */
	public function __construct(
		protected int $workspaceId,
		protected string $messageId,
		protected string $reaction,
	) {
	}
}
