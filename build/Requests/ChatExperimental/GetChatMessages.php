<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\ChatExperimental;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * getChatMessages.
 *
 * This endpoint retrieves messages for a specified Channel.
 */
class GetChatMessages extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int         $workspaceId   the ID of the Workspace
     * @param string      $channelId     the ID of the Channel where the messages live
     * @param string|null $cursor        the cursor to use to fetch the next page of results
     * @param int|null    $limit         the maximum number of results to fetch for this page
     * @param string|null $contentFormat Format of the message content (Default: text/md)
     */
    public function __construct(
        protected int $workspaceId,
        protected string $channelId,
        protected ?string $cursor = null,
        protected ?int $limit = null,
        protected ?string $contentFormat = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/chat/channels/{$this->channelId}/messages";
    }

    protected function defaultQuery(): array
    {
        return array_filter(['cursor' => $this->cursor, 'limit' => $this->limit, 'content_format' => $this->contentFormat], fn (mixed $value): bool => ! is_null($value));
    }
}
