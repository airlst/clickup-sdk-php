<?php

namespace ClickUp\V2\Requests\ChatExperimental;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createLocationChatChannel
 *
 * This endpoint creates a Channel and when a Channel already exists on the requested location, it
 * returns it.
 */
class CreateLocationChatChannel extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/chat/channels/location";
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param null|string $description The description for the Channel being created.
	 * @param null|string $topic The topic of the Channel being created.
	 * @param null|array $userIds Optionally specify unique user IDs, up to 100.
	 * @param null|string $visibility The visibility of the Channel being created. If not specified, the Channel is PUBLIC.
	 * @param mixed $location The location of the Channel: Space, Folder, or List
	 */
	public function __construct(
		protected int $workspaceId,
		protected ?string $description = null,
		protected ?string $topic = null,
		protected ?array $userIds = null,
		protected ?string $visibility = null,
		protected mixed $location,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'description' => $this->description,
			'topic' => $this->topic,
			'user_ids' => $this->userIds,
			'visibility' => $this->visibility,
			'location' => $this->location,
		]);
	}
}
