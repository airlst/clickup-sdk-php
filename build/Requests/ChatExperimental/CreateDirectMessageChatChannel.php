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
	 * @param null|array $userIds The unique user IDs of participants in the Direct Message, up to 10. A Self DM is created when no user IDs are provided
	 */
	public function __construct(
		protected int $workspaceId,
		protected ?array $userIds = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['user_ids' => $this->userIds]);
	}
}
