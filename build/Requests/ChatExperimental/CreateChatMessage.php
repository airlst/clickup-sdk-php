<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\ChatExperimental;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * createChatMessage.
 *
 * This endpoint creates a top level message.
 */
class CreateChatMessage extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param int            $workspaceId       the ID of the Workspace
     * @param string         $channelId         the ID of the Channel or direct message
     * @param string         $type              the type of message
     * @param string         $content           The full content of the message to be created
     * @param string|null    $assignee          the possible assignee of the message
     * @param string|null    $groupAssignee     the possible group assignee of the message
     * @param float|int|null $triagedAction     the triaged action applied to the message
     * @param string|null    $triagedObjectId   the message triaged action object id
     * @param float|int|null $triagedObjectType the message triaged action object type
     * @param array|null     $reactions         The reactions to the message that exist at creation time
     * @param array|null     $followers         The ids of the followers of the message
     * @param string|null    $contentFormat     The format of the message content (Default: text/md)
     * @param mixed|null     $postData          the data of the post message
     */
    public function __construct(
        protected int $workspaceId,
        protected string $channelId,
        protected string $type,
        protected string $content,
        protected ?string $assignee = null,
        protected ?string $groupAssignee = null,
        protected float|int|null $triagedAction = null,
        protected ?string $triagedObjectId = null,
        protected float|int|null $triagedObjectType = null,
        protected ?array $reactions = null,
        protected ?array $followers = null,
        protected ?string $contentFormat = null,
        protected mixed $postData = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/chat/channels/{$this->channelId}/messages";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'type' => $this->type,
            'content' => $this->content,
            'assignee' => $this->assignee,
            'group_assignee' => $this->groupAssignee,
            'triaged_action' => $this->triagedAction,
            'triaged_object_id' => $this->triagedObjectId,
            'triaged_object_type' => $this->triagedObjectType,
            'reactions' => $this->reactions,
            'followers' => $this->followers,
            'content_format' => $this->contentFormat,
            'post_data' => $this->postData,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
