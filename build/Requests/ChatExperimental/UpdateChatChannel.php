<?php

namespace ClickUp\V2\Requests\ChatExperimental;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateChatChannel
 *
 * This endpoint updates a single Channel.
 */
class UpdateChatChannel extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


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
