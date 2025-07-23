<?php

namespace ClickUp\V2\Requests\ChatExperimental;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getChatChannel
 *
 * This endpoint retrieves a specific Channel given its ID.
 */
class GetChatChannel extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/chat/channels/{$this->channelId}";
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $channelId The ID of the specified Channel.
	 * @param null|string $descriptionFormat Format of the Channel Description (Default: text/md)
	 */
	public function __construct(
		protected int $workspaceId,
		protected string $channelId,
		protected ?string $descriptionFormat = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['description_format' => $this->descriptionFormat]);
	}
}
