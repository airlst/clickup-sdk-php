<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\ChatExperimental;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getChatChannelMembers.
 *
 * This endpoint retrieves members of a specific Channel given its ID.
 */
class GetChatChannelMembers extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int         $workspaceId the ID of the Workspace
     * @param string      $channelId   the ID of the specified Channel
     * @param string|null $cursor      the cursor to use to fetch the next page of results
     * @param int|null    $limit       the maximum number of results to fetch for this page
     */
    public function __construct(
        protected int $workspaceId,
        protected string $channelId,
        protected ?string $cursor = null,
        protected ?int $limit = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/chat/channels/{$this->channelId}/members";
    }

    protected function defaultQuery(): array
    {
        return array_filter(['cursor' => $this->cursor, 'limit' => $this->limit]);
    }
}
