<?php

namespace ClickUp\V2\Requests\ChatExperimental;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getChatChannelFollowers
 *
 * This endpoint retrieves followers of a specific Channel given its ID.
 */
class GetChatChannelFollowers extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/chat/channels/{$this->channelId}/followers";
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $channelId The ID of the specified Channel.
	 * @param null|string $cursor The cursor to use to fetch the next page of results.
	 * @param null|int $limit The maximum number of results to fetch for this page.
	 */
	public function __construct(
		protected int $workspaceId,
		protected string $channelId,
		protected ?string $cursor = null,
		protected ?int $limit = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['cursor' => $this->cursor, 'limit' => $this->limit]);
	}
}
