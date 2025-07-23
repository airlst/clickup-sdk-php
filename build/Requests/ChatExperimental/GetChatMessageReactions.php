<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\ChatExperimental;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getChatMessageReactions.
 *
 * This endpoint retrieves reactions for a message
 */
class GetChatMessageReactions extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int         $workspaceId the ID of the Workspace
     * @param string      $messageId   The ID of the specified message
     * @param string|null $cursor      the cursor to use to fetch the next page of results
     * @param int|null    $limit       the maximum number of results to fetch for this page
     */
    public function __construct(
        protected int $workspaceId,
        protected string $messageId,
        protected ?string $cursor = null,
        protected ?int $limit = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/chat/messages/{$this->messageId}/reactions";
    }

    protected function defaultQuery(): array
    {
        return array_filter(['cursor' => $this->cursor, 'limit' => $this->limit]);
    }
}
