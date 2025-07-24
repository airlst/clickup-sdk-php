<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\ChatExperimental;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * createDirectMessageChatChannel.
 *
 * This endpoint creates a new Direct Message between up to 10 users. If a Direct Message between those
 * users already exists it returns it.
 */
class CreateDirectMessageChatChannel extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param int        $workspaceId the ID of the Workspace
     * @param array|null $userIds     The unique user IDs of participants in the Direct Message, up to 10. A Self DM is created when no user IDs are provided
     */
    public function __construct(
        protected int $workspaceId,
        protected ?array $userIds = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/chat/channels/direct_message";
    }

    public function defaultBody(): array
    {
        return array_filter(['user_ids' => $this->userIds], fn (mixed $value): bool => ! is_null($value));
    }
}
