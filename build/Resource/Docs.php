<?php

declare(strict_types=1);

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
     * @param float|int $workspaceId the ID of your Workspace
     * @param string    $id          filter results to a single Doc with the given Doc ID
     * @param float|int $creator     filter results to Docs created by the user with the given user ID
     * @param bool      $deleted     filter results to return deleted Docs
     * @param bool      $archived    filter results to return archived Docs
     * @param string    $parentId    filter results to children of a parent Doc with the given parent Doc ID
     * @param string    $parentType  Filter results to children of the given parent Doc type. For example, `SPACE`, `FOLDER`, `LIST`, `EVERYTHING`, `WORKSPACE`.
     * @param float|int $limit       the maximum number of results to retrieve for each page
     * @param string    $nextCursor  the cursor to use to get the next page of results
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
    ): Response {
        return $this->connector->send(new SearchDocs($workspaceId, $id, $creator, $deleted, $archived, $parentId, $parentType, $limit, $nextCursor));
    }

    /**
     * @param float|int $workspaceId the ID of the Workspace
     * @param string    $name        the name of the new Doc
     * @param mixed     $parent      the parent of the new Doc
     * @param string    $visibility  The visibility of the new Doc. For example, `PUBLIC` or `PRIVATE`.
     * @param bool      $createPage  create a new page when creating the Doc
     */
    public function createDoc(
        float|int $workspaceId,
        ?string $name = null,
        mixed $parent = null,
        ?string $visibility = null,
        ?bool $createPage = null,
    ): Response {
        return $this->connector->send(new CreateDoc($workspaceId, $name, $parent, $visibility, $createPage));
    }

    /**
     * @param float|int $workspaceId the ID of the Workspace
     * @param string    $docId       the ID of the Doc
     */
    public function getDoc(float|int $workspaceId, string $docId): Response
    {
        return $this->connector->send(new GetDoc($workspaceId, $docId));
    }

    /**
     * @param float|int $workspaceId  the ID of the Workspace
     * @param string    $docId        the ID of the Doc
     * @param float|int $maxPageDepth The maximum depth to retrieve pages and subpages. A value less than 0 does not limit the depth.
     */
    public function getDocPageListing(
        float|int $workspaceId,
        string $docId,
        float|int|null $maxPageDepth = null,
    ): Response {
        return $this->connector->send(new GetDocPageListing($workspaceId, $docId, $maxPageDepth));
    }

    /**
     * @param float|int $workspaceId   the ID of the Workspace
     * @param string    $docId         the ID of the Doc
     * @param float|int $maxPageDepth  The maximum depth to retrieve pages and subpages. A value less than 0 does not limit the depth.
     * @param string    $contentFormat The format to return the page content in. For example, `text/md` for markdown or `text/plain` for plain.
     */
    public function getDocPages(
        float|int $workspaceId,
        string $docId,
        float|int|null $maxPageDepth = null,
        ?string $contentFormat = null,
    ): Response {
        return $this->connector->send(new GetDocPages($workspaceId, $docId, $maxPageDepth, $contentFormat));
    }

    /**
     * @param float|int $workspaceId   the ID of the Workspace
     * @param string    $docId         the ID of the Doc
     * @param string    $parentPageId  The ID of the parent page. If this is a root page in the Doc, `parent_page_id` will not be returned.
     * @param string    $name          the name of the new page
     * @param string    $subTitle      the subtitle of the new page
     * @param string    $content       the content of the new page
     * @param string    $contentFormat The format the page content is in. For example, `text/md` for markdown or `text/plain` for plain.
     */
    public function createPage(
        float|int $workspaceId,
        string $docId,
        ?string $parentPageId = null,
        ?string $name = null,
        ?string $subTitle = null,
        ?string $content = null,
        ?string $contentFormat = null,
    ): Response {
        return $this->connector->send(new CreatePage($workspaceId, $docId, $parentPageId, $name, $subTitle, $content, $contentFormat));
    }

    /**
     * @param float|int $workspaceId   the ID of the Workspace
     * @param string    $docId         the ID of the Doc
     * @param string    $pageId        the ID of the page
     * @param string    $contentFormat The format to return the page content in. For example, `text/md` for markdown or `text/plain` for plain.
     */
    public function getPage(
        float|int $workspaceId,
        string $docId,
        string $pageId,
        ?string $contentFormat = null,
    ): Response {
        return $this->connector->send(new GetPage($workspaceId, $docId, $pageId, $contentFormat));
    }

    /**
     * @param float|int $workspaceId     the ID of the Workspace
     * @param string    $docId           the ID of the Doc
     * @param string    $pageId          the ID of the page
     * @param string    $name            the updated name of the page
     * @param string    $subTitle        the updated subtitle of the page
     * @param string    $content         the updated content of the page
     * @param string    $contentEditMode The strategy for updating content on the page. For example, `replace`, `append`, or `prepend`.
     * @param string    $contentFormat   The format the page content is in. For example, `text/md` for markdown and `text/plain` for plain.
     */
    public function editPage(
        float|int $workspaceId,
        string $docId,
        string $pageId,
        ?string $name = null,
        ?string $subTitle = null,
        ?string $content = null,
        ?string $contentEditMode = null,
        ?string $contentFormat = null,
    ): Response {
        return $this->connector->send(new EditPage($workspaceId, $docId, $pageId, $name, $subTitle, $content, $contentEditMode, $contentFormat));
    }
}
