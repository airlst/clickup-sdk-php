<?php

namespace ClickUp\V2\Requests\ChatExperimental;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createLocationChatChannel
 *
 * This endpoint creates a Channel and when a Channel already exists on the requested location, it
 * returns it.
 */
class CreateLocationChatChannel extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/chat/channels/location";
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 */
	public function __construct(
		protected int $workspaceId,
	) {
	}
}
