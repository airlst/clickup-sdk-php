<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\ChatExperimental;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getChatChannel.
 *
 * This endpoint retrieves a specific Channel given its ID.
 */
class GetChatChannel extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int         $workspaceId       the ID of the Workspace
     * @param string      $channelId         the ID of the specified Channel
     * @param string|null $descriptionFormat Format of the Channel Description (Default: text/md)
     */
    public function __construct(
        protected int $workspaceId,
        protected string $channelId,
        protected ?string $descriptionFormat = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/chat/channels/{$this->channelId}";
    }

    protected function defaultQuery(): array
    {
        return array_filter(['description_format' => $this->descriptionFormat]);
    }
}
