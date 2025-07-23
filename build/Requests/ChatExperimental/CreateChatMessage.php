<?php

namespace ClickUp\V2\Requests\ChatExperimental;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createChatMessage
 *
 * This endpoint creates a top level message.
 */
class CreateChatMessage extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/chat/channels/{$this->channelId}/messages";
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $channelId The ID of the Channel or direct message.
	 */
	public function __construct(
		protected int $workspaceId,
		protected string $channelId,
	) {
	}
}
