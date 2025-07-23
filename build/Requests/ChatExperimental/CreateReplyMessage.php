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
	 */
	public function __construct(
		protected int $workspaceId,
		protected string $messageId,
	) {
	}
}
