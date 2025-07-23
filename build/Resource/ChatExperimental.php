<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\ChatExperimental\CreateChatChannel;
use ClickUp\V2\Requests\ChatExperimental\CreateChatMessage;
use ClickUp\V2\Requests\ChatExperimental\CreateChatReaction;
use ClickUp\V2\Requests\ChatExperimental\CreateDirectMessageChatChannel;
use ClickUp\V2\Requests\ChatExperimental\CreateLocationChatChannel;
use ClickUp\V2\Requests\ChatExperimental\CreateReplyMessage;
use ClickUp\V2\Requests\ChatExperimental\DeleteChatChannel;
use ClickUp\V2\Requests\ChatExperimental\DeleteChatMessage;
use ClickUp\V2\Requests\ChatExperimental\DeleteChatReaction;
use ClickUp\V2\Requests\ChatExperimental\GetChatChannel;
use ClickUp\V2\Requests\ChatExperimental\GetChatChannelFollowers;
use ClickUp\V2\Requests\ChatExperimental\GetChatChannelMembers;
use ClickUp\V2\Requests\ChatExperimental\GetChatChannels;
use ClickUp\V2\Requests\ChatExperimental\GetChatMessageReactions;
use ClickUp\V2\Requests\ChatExperimental\GetChatMessageReplies;
use ClickUp\V2\Requests\ChatExperimental\GetChatMessageTaggedUsers;
use ClickUp\V2\Requests\ChatExperimental\GetChatMessages;
use ClickUp\V2\Requests\ChatExperimental\PatchChatMessage;
use ClickUp\V2\Requests\ChatExperimental\UpdateChatChannel;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class ChatExperimental extends Resource
{
	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $descriptionFormat Format of the Channel Description (Default: text/md)
	 * @param string $cursor Used to request the next or previous page of results
	 * @param int $limit The maximum number of results to fetch for this page.
	 * @param bool $isFollower Only return Channels the user is following
	 * @param bool $includeHidden Include DMs/Group DMs that have been explicitly closed.
	 * @param float|int $withCommentSince Only return Channels with comments since the given timestamp
	 * @param array $roomTypes Type of Channel (Channel, DM, Group DM) to return
	 */
	public function getChatChannels(
		int $workspaceId,
		?string $descriptionFormat = null,
		?string $cursor = null,
		?int $limit = null,
		?bool $isFollower = null,
		?bool $includeHidden = null,
		float|int|null $withCommentSince = null,
		?array $roomTypes = null,
	): Response
	{
		return $this->connector->send(new GetChatChannels($workspaceId, $descriptionFormat, $cursor, $limit, $isFollower, $includeHidden, $withCommentSince, $roomTypes));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 */
	public function createChatChannel(int $workspaceId): Response
	{
		return $this->connector->send(new CreateChatChannel($workspaceId));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 */
	public function createLocationChatChannel(int $workspaceId): Response
	{
		return $this->connector->send(new CreateLocationChatChannel($workspaceId));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 */
	public function createDirectMessageChatChannel(int $workspaceId): Response
	{
		return $this->connector->send(new CreateDirectMessageChatChannel($workspaceId));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $channelId The ID of the specified Channel.
	 * @param string $descriptionFormat Format of the Channel Description (Default: text/md)
	 */
	public function getChatChannel(int $workspaceId, string $channelId, ?string $descriptionFormat = null): Response
	{
		return $this->connector->send(new GetChatChannel($workspaceId, $channelId, $descriptionFormat));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $channelId The ID of the specified Channel.
	 */
	public function deleteChatChannel(int $workspaceId, string $channelId): Response
	{
		return $this->connector->send(new DeleteChatChannel($workspaceId, $channelId));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $channelId The ID of the specified Channel.
	 */
	public function updateChatChannel(int $workspaceId, string $channelId): Response
	{
		return $this->connector->send(new UpdateChatChannel($workspaceId, $channelId));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $channelId The ID of the specified Channel.
	 * @param string $cursor The cursor to use to fetch the next page of results.
	 * @param int $limit The maximum number of results to fetch for this page.
	 */
	public function getChatChannelFollowers(
		int $workspaceId,
		string $channelId,
		?string $cursor = null,
		?int $limit = null,
	): Response
	{
		return $this->connector->send(new GetChatChannelFollowers($workspaceId, $channelId, $cursor, $limit));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $channelId The ID of the specified Channel.
	 * @param string $cursor The cursor to use to fetch the next page of results.
	 * @param int $limit The maximum number of results to fetch for this page.
	 */
	public function getChatChannelMembers(
		int $workspaceId,
		string $channelId,
		?string $cursor = null,
		?int $limit = null,
	): Response
	{
		return $this->connector->send(new GetChatChannelMembers($workspaceId, $channelId, $cursor, $limit));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $channelId The ID of the Channel where the messages live.
	 * @param string $cursor The cursor to use to fetch the next page of results.
	 * @param int $limit The maximum number of results to fetch for this page.
	 * @param string $contentFormat Format of the message content (Default: text/md)
	 */
	public function getChatMessages(
		int $workspaceId,
		string $channelId,
		?string $cursor = null,
		?int $limit = null,
		?string $contentFormat = null,
	): Response
	{
		return $this->connector->send(new GetChatMessages($workspaceId, $channelId, $cursor, $limit, $contentFormat));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $channelId The ID of the Channel or direct message.
	 */
	public function createChatMessage(int $workspaceId, string $channelId): Response
	{
		return $this->connector->send(new CreateChatMessage($workspaceId, $channelId));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $messageId The ID of the specified message
	 */
	public function deleteChatMessage(int $workspaceId, string $messageId): Response
	{
		return $this->connector->send(new DeleteChatMessage($workspaceId, $messageId));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $messageId The ID of the specified message
	 */
	public function patchChatMessage(int $workspaceId, string $messageId): Response
	{
		return $this->connector->send(new PatchChatMessage($workspaceId, $messageId));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $messageId The ID of the specified message
	 * @param string $cursor The cursor to use to fetch the next page of results.
	 * @param int $limit The maximum number of results to fetch for this page.
	 */
	public function getChatMessageReactions(
		int $workspaceId,
		string $messageId,
		?string $cursor = null,
		?int $limit = null,
	): Response
	{
		return $this->connector->send(new GetChatMessageReactions($workspaceId, $messageId, $cursor, $limit));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $messageId The ID of the specified message
	 */
	public function createChatReaction(int $workspaceId, string $messageId): Response
	{
		return $this->connector->send(new CreateChatReaction($workspaceId, $messageId));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $messageId The ID of the specified message
	 * @param string $reaction The name of the reaction to be deleted.
	 */
	public function deleteChatReaction(int $workspaceId, string $messageId, string $reaction): Response
	{
		return $this->connector->send(new DeleteChatReaction($workspaceId, $messageId, $reaction));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $messageId The ID of the specified message
	 * @param string $cursor The cursor to use to fetch the next page of results.
	 * @param int $limit The maximum number of results to fetch for this page.
	 * @param string $contentFormat Format of the message content (Default: text/md)
	 */
	public function getChatMessageReplies(
		int $workspaceId,
		string $messageId,
		?string $cursor = null,
		?int $limit = null,
		?string $contentFormat = null,
	): Response
	{
		return $this->connector->send(new GetChatMessageReplies($workspaceId, $messageId, $cursor, $limit, $contentFormat));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $messageId The ID of the specified message
	 */
	public function createReplyMessage(int $workspaceId, string $messageId): Response
	{
		return $this->connector->send(new CreateReplyMessage($workspaceId, $messageId));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $messageId The ID of the specified message
	 * @param string $cursor The cursor to use to fetch the next page of results.
	 * @param int $limit The maximum number of results to fetch for this page.
	 */
	public function getChatMessageTaggedUsers(
		int $workspaceId,
		string $messageId,
		?string $cursor = null,
		?int $limit = null,
	): Response
	{
		return $this->connector->send(new GetChatMessageTaggedUsers($workspaceId, $messageId, $cursor, $limit));
	}
}
