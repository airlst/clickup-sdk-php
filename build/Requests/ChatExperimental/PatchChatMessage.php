<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\ChatExperimental;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * patchChatMessage.
 *
 * This endpoint updates a message.
 */
class PatchChatMessage extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    /**
     * @param int         $workspaceId   the ID of the Workspace
     * @param string      $messageId     The ID of the specified message
     * @param string|null $assignee      the possible assignee of the message
     * @param string|null $groupAssignee the possible group assignee of the message
     * @param string|null $content       The full content of the message to be created
     * @param string|null $contentFormat The format of the message content (Default: text/md)
     * @param mixed|null  $postData      the data of the post message
     * @param bool|null   $resolved      the resolved status of the message
     */
    public function __construct(
        protected int $workspaceId,
        protected string $messageId,
        protected ?string $assignee = null,
        protected ?string $groupAssignee = null,
        protected ?string $content = null,
        protected ?string $contentFormat = null,
        protected mixed $postData = null,
        protected ?bool $resolved = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/chat/messages/{$this->messageId}";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'assignee' => $this->assignee,
            'group_assignee' => $this->groupAssignee,
            'content' => $this->content,
            'content_format' => $this->contentFormat,
            'post_data' => $this->postData,
            'resolved' => $this->resolved,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
