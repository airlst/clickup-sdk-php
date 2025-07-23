<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Views\CreateFolderView;
use ClickUp\V2\Requests\Views\CreateListView;
use ClickUp\V2\Requests\Views\CreateSpaceView;
use ClickUp\V2\Requests\Views\CreateTeamView;
use ClickUp\V2\Requests\Views\DeleteView;
use ClickUp\V2\Requests\Views\GetFolderViews;
use ClickUp\V2\Requests\Views\GetListViews;
use ClickUp\V2\Requests\Views\GetSpaceViews;
use ClickUp\V2\Requests\Views\GetTeamViews;
use ClickUp\V2\Requests\Views\GetView;
use ClickUp\V2\Requests\Views\GetViewTasks;
use ClickUp\V2\Requests\Views\UpdateView;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Views extends Resource
{
	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function getTeamViews(float|int $teamId): Response
	{
		return $this->connector->send(new GetTeamViews($teamId));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function createTeamView(float|int $teamId): Response
	{
		return $this->connector->send(new CreateTeamView($teamId));
	}


	/**
	 * @param float|int $spaceId
	 */
	public function getSpaceViews(float|int $spaceId): Response
	{
		return $this->connector->send(new GetSpaceViews($spaceId));
	}


	/**
	 * @param float|int $spaceId
	 */
	public function createSpaceView(float|int $spaceId): Response
	{
		return $this->connector->send(new CreateSpaceView($spaceId));
	}


	/**
	 * @param float|int $folderId
	 */
	public function getFolderViews(float|int $folderId): Response
	{
		return $this->connector->send(new GetFolderViews($folderId));
	}


	/**
	 * @param float|int $folderId
	 */
	public function createFolderView(float|int $folderId): Response
	{
		return $this->connector->send(new CreateFolderView($folderId));
	}


	/**
	 * @param float|int $listId
	 */
	public function getListViews(float|int $listId): Response
	{
		return $this->connector->send(new GetListViews($listId));
	}


	/**
	 * @param float|int $listId
	 */
	public function createListView(float|int $listId): Response
	{
		return $this->connector->send(new CreateListView($listId));
	}


	/**
	 * @param string $viewId
	 */
	public function getView(string $viewId): Response
	{
		return $this->connector->send(new GetView($viewId));
	}


	/**
	 * @param string $viewId
	 */
	public function updateView(string $viewId): Response
	{
		return $this->connector->send(new UpdateView($viewId));
	}


	/**
	 * @param string $viewId 105 (string)
	 */
	public function deleteView(string $viewId): Response
	{
		return $this->connector->send(new DeleteView($viewId));
	}


	/**
	 * @param string $viewId 105 (string)
	 * @param int $page
	 */
	public function getViewTasks(string $viewId, int $page): Response
	{
		return $this->connector->send(new GetViewTasks($viewId, $page));
	}
}
