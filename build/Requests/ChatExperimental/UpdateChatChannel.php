<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\ChatExperimental;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateChatChannel.
 *
 * This endpoint updates a single Channel.
 */
class UpdateChatChannel extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    /**
     * @param int         $workspaceId   the ID of the Workspace
     * @param string      $channelId     the ID of the specified Channel
     * @param string|null $contentFormat The format of content field values (Default: text/md)
     * @param string|null $description   the updated description of the Channel
     * @param mixed|null  $location      The updated location of the Channel: Space, Folder, or List
     * @param string|null $name          the updated name of the Channel
     * @param string|null $topic         the updated topic of the Channel
     * @param string|null $visibility    the updated visibility of the Channel
     */
    public function __construct(
        protected int $workspaceId,
        protected string $channelId,
        protected ?string $contentFormat = null,
        protected ?string $description = null,
        protected mixed $location = null,
        protected ?string $name = null,
        protected ?string $topic = null,
        protected ?string $visibility = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/chat/channels/{$this->channelId}";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'content_format' => $this->contentFormat,
            'description' => $this->description,
            'location' => $this->location,
            'name' => $this->name,
            'topic' => $this->topic,
            'visibility' => $this->visibility,
        ]);
    }
}
