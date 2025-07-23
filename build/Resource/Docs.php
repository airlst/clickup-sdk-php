<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Docs\CreateDoc;
use ClickUp\V2\Requests\Docs\CreatePage;
use ClickUp\V2\Requests\Docs\EditPage;
use ClickUp\V2\Requests\Docs\GetDoc;
use ClickUp\V2\Requests\Docs\GetDocPageListing;
use ClickUp\V2\Requests\Docs\GetDocPages;
use ClickUp\V2\Requests\Docs\GetPage;
use ClickUp\V2\Requests\Docs\SearchDocs;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Docs extends Resource
{
	/**
	 * @param float|int $workspaceId The ID of your Workspace.
	 * @param string $id Filter results to a single Doc with the given Doc ID.
	 * @param float|int $creator Filter results to Docs created by the user with the given user ID.
	 * @param bool $deleted Filter results to return deleted Docs.
	 * @param bool $archived Filter results to return archived Docs.
	 * @param string $parentId Filter results to children of a parent Doc with the given parent Doc ID.
	 * @param string $parentType Filter results to children of the given parent Doc type. For example, `SPACE`, `FOLDER`, `LIST`, `EVERYTHING`, `WORKSPACE`.
	 * @param float|int $limit The maximum number of results to retrieve for each page.
	 * @param string $nextCursor The cursor to use to get the next page of results.
	 */
	public function searchDocs(
		float|int $workspaceId,
		?string $id = null,
		float|int|null $creator = null,
		?bool $deleted = null,
		?bool $archived = null,
		?string $parentId = null,
		?string $parentType = null,
		float|int|null $limit = null,
		?string $nextCursor = null,
	): Response
	{
		return $this->connector->send(new SearchDocs($workspaceId, $id, $creator, $deleted, $archived, $parentId, $parentType, $limit, $nextCursor));
	}


	/**
	 * @param float|int $workspaceId The ID of the Workspace.
	 */
	public function createDoc(float|int $workspaceId): Response
	{
		return $this->connector->send(new CreateDoc($workspaceId));
	}


	/**
	 * @param float|int $workspaceId The ID of the Workspace.
	 * @param string $docId The ID of the Doc.
	 */
	public function getDoc(float|int $workspaceId, string $docId): Response
	{
		return $this->connector->send(new GetDoc($workspaceId, $docId));
	}


	/**
	 * @param float|int $workspaceId The ID of the Workspace.
	 * @param string $docId The ID of the Doc.
	 * @param float|int $maxPageDepth The maximum depth to retrieve pages and subpages. A value less than 0 does not limit the depth.
	 */
	public function getDocPageListing(
		float|int $workspaceId,
		string $docId,
		float|int|null $maxPageDepth = null,
	): Response
	{
		return $this->connector->send(new GetDocPageListing($workspaceId, $docId, $maxPageDepth));
	}


	/**
	 * @param float|int $workspaceId The ID of the Workspace.
	 * @param string $docId The ID of the Doc.
	 * @param float|int $maxPageDepth The maximum depth to retrieve pages and subpages. A value less than 0 does not limit the depth.
	 * @param string $contentFormat The format to return the page content in. For example, `text/md` for markdown or `text/plain` for plain.
	 */
	public function getDocPages(
		float|int $workspaceId,
		string $docId,
		float|int|null $maxPageDepth = null,
		?string $contentFormat = null,
	): Response
	{
		return $this->connector->send(new GetDocPages($workspaceId, $docId, $maxPageDepth, $contentFormat));
	}


	/**
	 * @param float|int $workspaceId The ID of the Workspace.
	 * @param string $docId The ID of the Doc.
	 */
	public function createPage(float|int $workspaceId, string $docId): Response
	{
		return $this->connector->send(new CreatePage($workspaceId, $docId));
	}


	/**
	 * @param float|int $workspaceId The ID of the Workspace.
	 * @param string $docId The ID of the Doc.
	 * @param string $pageId The ID of the page.
	 * @param string $contentFormat The format to return the page content in. For example, `text/md` for markdown or `text/plain` for plain.
	 */
	public function getPage(
		float|int $workspaceId,
		string $docId,
		string $pageId,
		?string $contentFormat = null,
	): Response
	{
		return $this->connector->send(new GetPage($workspaceId, $docId, $pageId, $contentFormat));
	}


	/**
	 * @param float|int $workspaceId The ID of the Workspace.
	 * @param string $docId The ID of the Doc.
	 * @param string $pageId The ID of the page.
	 */
	public function editPage(float|int $workspaceId, string $docId, string $pageId): Response
	{
		return $this->connector->send(new EditPage($workspaceId, $docId, $pageId));
	}
}
