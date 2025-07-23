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
	 * @param string $description The description for the Channel being created.
	 * @param string $name The name for the Channel being created.
	 * @param string $topic The topic of the Channel being created.
	 * @param array $userIds Optionally specify unique user IDs, up to 100.
	 * @param string $visibility The visibility of the Channel being created. If not specified, the Channel is PUBLIC.
	 */
	public function createChatChannel(
		int $workspaceId,
		?string $description = null,
		string $name,
		?string $topic = null,
		?array $userIds = null,
		?string $visibility = null,
	): Response
	{
		return $this->connector->send(new CreateChatChannel($workspaceId, $description, $name, $topic, $userIds, $visibility));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param string $description The description for the Channel being created.
	 * @param string $topic The topic of the Channel being created.
	 * @param array $userIds Optionally specify unique user IDs, up to 100.
	 * @param string $visibility The visibility of the Channel being created. If not specified, the Channel is PUBLIC.
	 * @param mixed $location The location of the Channel: Space, Folder, or List
	 */
	public function createLocationChatChannel(
		int $workspaceId,
		?string $description = null,
		?string $topic = null,
		?array $userIds = null,
		?string $visibility = null,
		mixed $location,
	): Response
	{
		return $this->connector->send(new CreateLocationChatChannel($workspaceId, $description, $topic, $userIds, $visibility, $location));
	}


	/**
	 * @param int $workspaceId The ID of the Workspace.
	 * @param array $userIds The unique user IDs of participants in the Direct Message, up to 10. A Self DM is created when no user IDs are provided
	 */
	public function createDirectMessageChatChannel(int $workspaceId, ?array $userIds = null): Response
	{
		return $this->connector->send(new CreateDirectMessageChatChannel($workspaceId, $userIds));
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
	 * @param string $contentFormat The format of content field values (Default: text/md)
	 * @param string $description The updated description of the Channel.
	 * @param mixed $location The updated location of the Channel: Space, Folder, or List
	 * @param string $name The updated name of the Channel.
	 * @param string $topic The updated topic of the Channel.
	 * @param string $visibility The updated visibility of the Channel.
	 */
	public function updateChatChannel(
		int $workspaceId,
		string $channelId,
		?string $contentFormat = null,
		?string $description = null,
		mixed $location = null,
		?string $name = null,
		?string $topic = null,
		?string $visibility = null,
	): Response
	{
		return $this->connector->send(new UpdateChatChannel($workspaceId, $channelId, $contentFormat, $description, $location, $name, $topic, $visibility));
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
	 * @param string $assignee The possible assignee of the message.
	 * @param string $groupAssignee The possible group assignee of the message.
	 * @param float|int $triagedAction The triaged action applied to the message.
	 * @param string $triagedObjectId The message triaged action object id.
	 * @param float|int $triagedObjectType The message triaged action object type.
	 * @param string $type The type of message.
	 * @param string $content The full content of the message to be created
	 * @param array $reactions The reactions to the message that exist at creation time
	 * @param array $followers The ids of the followers of the message
	 * @param string $contentFormat The format of the message content (Default: text/md)
	 * @param mixed $postData The data of the post message.
	 */
	public function createChatMessage(
		int $workspaceId,
		string $channelId,
		?string $assignee = null,
		?string $groupAssignee = null,
		float|int|null $triagedAction = null,
		?string $triagedObjectId = null,
		float|int|null $triagedObjectType = null,
		string $type,
		string $content,
		?array $reactions = null,
		?array $followers = null,
		?string $contentFormat = null,
		mixed $postData = null,
	): Response
	{
		return $this->connector->send(new CreateChatMessage($workspaceId, $channelId, $assignee, $groupAssignee, $triagedAction, $triagedObjectId, $triagedObjectType, $type, $content, $reactions, $followers, $contentFormat, $postData));
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
	 * @param string $assignee The possible assignee of the message.
	 * @param string $groupAssignee The possible group assignee of the message.
	 * @param string $content The full content of the message to be created
	 * @param string $contentFormat The format of the message content (Default: text/md)
	 * @param mixed $postData The data of the post message.
	 * @param bool $resolved The resolved status of the message.
	 */
	public function patchChatMessage(
		int $workspaceId,
		string $messageId,
		?string $assignee = null,
		?string $groupAssignee = null,
		?string $content = null,
		?string $contentFormat = null,
		mixed $postData = null,
		?bool $resolved = null,
	): Response
	{
		return $this->connector->send(new PatchChatMessage($workspaceId, $messageId, $assignee, $groupAssignee, $content, $contentFormat, $postData, $resolved));
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
	 * @param string $reaction The name of the emoji to use for the reaction.
	 */
	public function createChatReaction(int $workspaceId, string $messageId, string $reaction): Response
	{
		return $this->connector->send(new CreateChatReaction($workspaceId, $messageId, $reaction));
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
	 * @param string $assignee The possible assignee of the message.
	 * @param string $groupAssignee The possible group assignee of the message.
	 * @param float|int $triagedAction The triaged action applied to the message.
	 * @param string $triagedObjectId The message triaged action object id.
	 * @param float|int $triagedObjectType The message triaged action object type.
	 * @param string $type The type of message.
	 * @param string $content The full content of the message to be created
	 * @param array $reactions The reactions to the message that exist at creation time
	 * @param array $followers The ids of the followers of the message
	 * @param string $contentFormat The format of the message content (Default: text/md)
	 * @param mixed $postData The data of the post message.
	 */
	public function createReplyMessage(
		int $workspaceId,
		string $messageId,
		?string $assignee = null,
		?string $groupAssignee = null,
		float|int|null $triagedAction = null,
		?string $triagedObjectId = null,
		float|int|null $triagedObjectType = null,
		string $type,
		string $content,
		?array $reactions = null,
		?array $followers = null,
		?string $contentFormat = null,
		mixed $postData = null,
	): Response
	{
		return $this->connector->send(new CreateReplyMessage($workspaceId, $messageId, $assignee, $groupAssignee, $triagedAction, $triagedObjectId, $triagedObjectType, $type, $content, $reactions, $followers, $contentFormat, $postData));
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
