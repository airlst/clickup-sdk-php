<?php

namespace ClickUp\V2\Requests\ChatExperimental;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createChatChannel
 *
 * This endpoint creates a new Channel not tied to a Space, Folder, or List. If a Channel with the
 * specified name already exists it returns it.
 */
class CreateChatChannel extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/chat/channels";
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param null|string $description The description for the Channel being created.
	 * @param string $name The name for the Channel being created.
	 * @param null|string $topic The topic of the Channel being created.
	 * @param null|array $userIds Optionally specify unique user IDs, up to 100.
	 * @param null|string $visibility The visibility of the Channel being created. If not specified, the Channel is PUBLIC.
	 */
	public function __construct(
		protected int $workspaceId,
		protected ?string $description = null,
		protected string $name,
		protected ?string $topic = null,
		protected ?array $userIds = null,
		protected ?string $visibility = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'description' => $this->description,
			'name' => $this->name,
			'topic' => $this->topic,
			'user_ids' => $this->userIds,
			'visibility' => $this->visibility,
		]);
	}
}
