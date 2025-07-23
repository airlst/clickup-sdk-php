<?php

namespace ClickUp\V2\Requests\ChatExperimental;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getChatChannels
 *
 * This endpoint retrieves the Channels in a Workspace.
 */
class GetChatChannels extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/chat/channels";
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param null|string $descriptionFormat Format of the Channel Description (Default: text/md)
	 * @param null|string $cursor Used to request the next or previous page of results
	 * @param null|int $limit The maximum number of results to fetch for this page.
	 * @param null|bool $isFollower Only return Channels the user is following
	 * @param null|bool $includeHidden Include DMs/Group DMs that have been explicitly closed.
	 * @param null|float|int $withCommentSince Only return Channels with comments since the given timestamp
	 * @param null|array $roomTypes Type of Channel (Channel, DM, Group DM) to return
	 */
	public function __construct(
		protected int $workspaceId,
		protected ?string $descriptionFormat = null,
		protected ?string $cursor = null,
		protected ?int $limit = null,
		protected ?bool $isFollower = null,
		protected ?bool $includeHidden = null,
		protected float|int|null $withCommentSince = null,
		protected ?array $roomTypes = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'description_format' => $this->descriptionFormat,
			'cursor' => $this->cursor,
			'limit' => $this->limit,
			'is_follower' => $this->isFollower,
			'include_hidden' => $this->includeHidden,
			'with_comment_since' => $this->withCommentSince,
			'room_types' => $this->roomTypes,
		]);
	}
}
