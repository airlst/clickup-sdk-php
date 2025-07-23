<?php

namespace ClickUp\V2\Requests\ChatExperimental;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createReplyMessage
 *
 * This endpoint creates a reply message.
 */
class CreateReplyMessage extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/chat/messages/{$this->messageId}/replies";
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $messageId The ID of the specified message
	 * @param null|string $assignee The possible assignee of the message.
	 * @param null|string $groupAssignee The possible group assignee of the message.
	 * @param null|float|int $triagedAction The triaged action applied to the message.
	 * @param null|string $triagedObjectId The message triaged action object id.
	 * @param null|float|int $triagedObjectType The message triaged action object type.
	 * @param string $type The type of message.
	 * @param string $content The full content of the message to be created
	 * @param null|array $reactions The reactions to the message that exist at creation time
	 * @param null|array $followers The ids of the followers of the message
	 * @param null|string $contentFormat The format of the message content (Default: text/md)
	 * @param null|mixed $postData The data of the post message.
	 */
	public function __construct(
		protected int $workspaceId,
		protected string $messageId,
		protected ?string $assignee = null,
		protected ?string $groupAssignee = null,
		protected float|int|null $triagedAction = null,
		protected ?string $triagedObjectId = null,
		protected float|int|null $triagedObjectType = null,
		protected string $type,
		protected string $content,
		protected ?array $reactions = null,
		protected ?array $followers = null,
		protected ?string $contentFormat = null,
		protected mixed $postData = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'assignee' => $this->assignee,
			'group_assignee' => $this->groupAssignee,
			'triaged_action' => $this->triagedAction,
			'triaged_object_id' => $this->triagedObjectId,
			'triaged_object_type' => $this->triagedObjectType,
			'type' => $this->type,
			'content' => $this->content,
			'reactions' => $this->reactions,
			'followers' => $this->followers,
			'content_format' => $this->contentFormat,
			'post_data' => $this->postData,
		]);
	}
}
