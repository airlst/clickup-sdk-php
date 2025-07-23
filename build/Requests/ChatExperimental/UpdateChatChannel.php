<?php

namespace ClickUp\V2\Requests\ChatExperimental;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateChatChannel
 *
 * This endpoint updates a single Channel.
 */
class UpdateChatChannel extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/chat/channels/{$this->channelId}";
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $channelId The ID of the specified Channel.
	 * @param null|string $contentFormat The format of content field values (Default: text/md)
	 * @param null|string $description The updated description of the Channel.
	 * @param null|mixed $location The updated location of the Channel: Space, Folder, or List
	 * @param null|string $name The updated name of the Channel.
	 * @param null|string $topic The updated topic of the Channel.
	 * @param null|string $visibility The updated visibility of the Channel.
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
	) {
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
