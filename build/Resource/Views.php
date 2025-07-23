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
	 * @param string $name
	 * @param string $type The type of view to create. Options include: `list`, `board`, `calendar`, `table`, `timeline`, `workload`, `activity`, `map`, `conversation`, or `gantt`.
	 * @param array $grouping
	 * @param array $divide
	 * @param array $sorting
	 * @param array $filters
	 * @param array $columns Custom Fields added to a view at the Everything level will be added to all tasks in your Workspace. Once Custom Fields are added to one of these views, you cannot move it to another level of the Hierarchy.
	 * @param array $teamSidebar
	 * @param array $settings
	 */
	public function createTeamView(
		float|int $teamId,
		string $name,
		string $type,
		array $grouping,
		array $divide,
		array $sorting,
		array $filters,
		array $columns,
		array $teamSidebar,
		array $settings,
	): Response
	{
		return $this->connector->send(new CreateTeamView($teamId, $name, $type, $grouping, $divide, $sorting, $filters, $columns, $teamSidebar, $settings));
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
	 * @param string $name
	 * @param string $type The type of view to create. Options include: `list`, `board`, `calendar`, `table`, `timeline`, `workload`, `activity`, `map`, `conversation`, or `gantt`.
	 * @param array $grouping
	 * @param array $divide
	 * @param array $sorting
	 * @param array $filters
	 * @param array $columns Custom Fields added to a view at the Everything level will be added to all tasks in your Workspace. Once Custom Fields are added to one of these views, you cannot move it to another level of the Hierarchy.
	 * @param array $teamSidebar
	 * @param array $settings
	 */
	public function createSpaceView(
		float|int $spaceId,
		string $name,
		string $type,
		array $grouping,
		array $divide,
		array $sorting,
		array $filters,
		array $columns,
		array $teamSidebar,
		array $settings,
	): Response
	{
		return $this->connector->send(new CreateSpaceView($spaceId, $name, $type, $grouping, $divide, $sorting, $filters, $columns, $teamSidebar, $settings));
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
	 * @param string $name
	 * @param string $type The type of view to create. Options include: `list`, `board`, `calendar`, `table`, `timeline`, `workload`, `activity`, `map`, `conversation`, or `gantt`.
	 * @param array $grouping
	 * @param array $divide
	 * @param array $sorting
	 * @param array $filters
	 * @param array $columns Custom Fields added to a view at the Everything level will be added to all tasks in your Workspace. Once Custom Fields are added to one of these views, you cannot move it to another level of the Hierarchy.
	 * @param array $teamSidebar
	 * @param array $settings
	 */
	public function createFolderView(
		float|int $folderId,
		string $name,
		string $type,
		array $grouping,
		array $divide,
		array $sorting,
		array $filters,
		array $columns,
		array $teamSidebar,
		array $settings,
	): Response
	{
		return $this->connector->send(new CreateFolderView($folderId, $name, $type, $grouping, $divide, $sorting, $filters, $columns, $teamSidebar, $settings));
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
	 * @param string $name
	 * @param string $type The type of view to create. Options include: `list`, `board`, `calendar`, `table`, `timeline`, `workload`, `activity`, `map`, `conversation`, or `gantt`.
	 * @param array $grouping
	 * @param array $divide
	 * @param array $sorting
	 * @param array $filters
	 * @param array $columns Custom Fields added to a view at the Everything level will be added to all tasks in your Workspace. Once Custom Fields are added to one of these views, you cannot move it to another level of the Hierarchy.
	 * @param array $teamSidebar
	 * @param array $settings
	 */
	public function createListView(
		float|int $listId,
		string $name,
		string $type,
		array $grouping,
		array $divide,
		array $sorting,
		array $filters,
		array $columns,
		array $teamSidebar,
		array $settings,
	): Response
	{
		return $this->connector->send(new CreateListView($listId, $name, $type, $grouping, $divide, $sorting, $filters, $columns, $teamSidebar, $settings));
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
	 * @param string $name
	 * @param string $type
	 * @param array $parent The parent parameter specifies where the view is located in the ClickUp Hierarchy. Both `id` and `type` are required. \
	 *  \
	 * The `id` is the id of the Workspace, Space, Folder, or List where the view is located. \
	 *  \
	 * The `type` value indciates the level of the Hierarchy where the view is located.
	 * @param array $grouping
	 * @param array $divide
	 * @param array $sorting
	 * @param array $filters
	 * @param array $columns Custom Fields added to a view at the Everything level will be added to all tasks in your Workspace. Once Custom Fields are added to one of these views, you cannot move it to another level of the Hierarchy.
	 * @param array $teamSidebar
	 * @param array $settings
	 */
	public function updateView(
		string $viewId,
		string $name,
		string $type,
		array $parent,
		array $grouping,
		array $divide,
		array $sorting,
		array $filters,
		array $columns,
		array $teamSidebar,
		array $settings,
	): Response
	{
		return $this->connector->send(new UpdateView($viewId, $name, $type, $parent, $grouping, $divide, $sorting, $filters, $columns, $teamSidebar, $settings));
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
