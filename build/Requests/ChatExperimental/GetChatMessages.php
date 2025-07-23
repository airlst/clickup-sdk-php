<?php

namespace ClickUp\V2\Requests\ChatExperimental;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getChatMessages
 *
 * This endpoint retrieves messages for a specified Channel.
 */
class GetChatMessages extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/chat/channels/{$this->channelId}/messages";
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $channelId The ID of the Channel where the messages live.
	 * @param null|string $cursor The cursor to use to fetch the next page of results.
	 * @param null|int $limit The maximum number of results to fetch for this page.
	 * @param null|string $contentFormat Format of the message content (Default: text/md)
	 */
	public function __construct(
		protected int $workspaceId,
		protected string $channelId,
		protected ?string $cursor = null,
		protected ?int $limit = null,
		protected ?string $contentFormat = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['cursor' => $this->cursor, 'limit' => $this->limit, 'content_format' => $this->contentFormat]);
	}
}
