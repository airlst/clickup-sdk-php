<?php

namespace ClickUp\V2\Requests\ChatExperimental;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * patchChatMessage
 *
 * This endpoint updates a message.
 */
class PatchChatMessage extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/chat/messages/{$this->messageId}";
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $messageId The ID of the specified message
	 * @param null|string $assignee The possible assignee of the message.
	 * @param null|string $groupAssignee The possible group assignee of the message.
	 * @param null|string $content The full content of the message to be created
	 * @param null|string $contentFormat The format of the message content (Default: text/md)
	 * @param null|mixed $postData The data of the post message.
	 * @param null|bool $resolved The resolved status of the message.
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
	) {
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
		]);
	}
}
