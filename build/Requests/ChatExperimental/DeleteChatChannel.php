<?php

namespace ClickUp\V2\Requests\ChatExperimental;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteChatChannel
 *
 * This endpoint deletes a Channel. Applies to Channels tied to a Space, Folder, or List or not tied to
 * locations.
 */
class DeleteChatChannel extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/chat/channels/{$this->channelId}";
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $channelId The ID of the specified Channel.
	 */
	public function __construct(
		protected int $workspaceId,
		protected string $channelId,
	) {
	}
}
