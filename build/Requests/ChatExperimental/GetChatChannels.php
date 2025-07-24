<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\ChatExperimental;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * getChatChannels.
 *
 * This endpoint retrieves the Channels in a Workspace.
 */
class GetChatChannels extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int            $workspaceId       the ID of the Workspace
     * @param string|null    $descriptionFormat Format of the Channel Description (Default: text/md)
     * @param string|null    $cursor            Used to request the next or previous page of results
     * @param int|null       $limit             the maximum number of results to fetch for this page
     * @param bool|null      $isFollower        Only return Channels the user is following
     * @param bool|null      $includeHidden     include DMs/Group DMs that have been explicitly closed
     * @param float|int|null $withCommentSince  Only return Channels with comments since the given timestamp
     * @param array|null     $roomTypes         Type of Channel (Channel, DM, Group DM) to return
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
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/chat/channels";
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'description_format' => $this->descriptionFormat,
            'cursor' => $this->cursor,
            'limit' => $this->limit,
            'is_follower' => $this->isFollower,
            'include_hidden' => $this->includeHidden,
            'with_comment_since' => $this->withCommentSince,
            'room_types' => $this->roomTypes,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
