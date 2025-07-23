<?php

namespace ClickUp\V2\Requests\ChatExperimental;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getChatMessageReplies
 *
 * This endpoint retrieves replies to a message.
 */
class GetChatMessageReplies extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/chat/messages/{$this->messageId}/replies";
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $messageId The ID of the specified message
	 * @param null|string $cursor The cursor to use to fetch the next page of results.
	 * @param null|int $limit The maximum number of results to fetch for this page.
	 * @param null|string $contentFormat Format of the message content (Default: text/md)
	 */
	public function __construct(
		protected int $workspaceId,
		protected string $messageId,
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
