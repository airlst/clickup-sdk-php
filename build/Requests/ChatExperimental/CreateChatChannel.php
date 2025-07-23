<?php

namespace ClickUp\V2\Requests\ChatExperimental;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createChatChannel
 *
 * This endpoint creates a new Channel not tied to a Space, Folder, or List. If a Channel with the
 * specified name already exists it returns it.
 */
class CreateChatChannel extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/chat/channels";
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 */
	public function __construct(
		protected int $workspaceId,
	) {
	}
}
