<?php

namespace ClickUp\V2\Requests\ChatExperimental;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createDirectMessageChatChannel
 *
 * This endpoint creates a new Direct Message between up to 10 users. If a Direct Message between those
 * users already exists it returns it.
 */
class CreateDirectMessageChatChannel extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/chat/channels/direct_message";
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 */
	public function __construct(
		protected int $workspaceId,
	) {
	}
}
