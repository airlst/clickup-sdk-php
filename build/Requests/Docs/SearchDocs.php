<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Docs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * searchDocs.
 *
 * View the Docs in your Workspace. You can only view information of Docs you can access.
 */
class SearchDocs extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param float|int      $workspaceId the ID of your Workspace
     * @param string|null    $id          filter results to a single Doc with the given Doc ID
     * @param float|int|null $creator     filter results to Docs created by the user with the given user ID
     * @param bool|null      $deleted     filter results to return deleted Docs
     * @param bool|null      $archived    filter results to return archived Docs
     * @param string|null    $parentId    filter results to children of a parent Doc with the given parent Doc ID
     * @param string|null    $parentType  Filter results to children of the given parent Doc type. For example, `SPACE`, `FOLDER`, `LIST`, `EVERYTHING`, `WORKSPACE`.
     * @param float|int|null $limit       the maximum number of results to retrieve for each page
     * @param string|null    $nextCursor  the cursor to use to get the next page of results
     */
    public function __construct(
        protected float|int $workspaceId,
        protected ?string $id = null,
        protected float|int|null $creator = null,
        protected ?bool $deleted = null,
        protected ?bool $archived = null,
        protected ?string $parentId = null,
        protected ?string $parentType = null,
        protected float|int|null $limit = null,
        protected ?string $nextCursor = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/docs";
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'id' => $this->id,
            'creator' => $this->creator,
            'deleted' => $this->deleted,
            'archived' => $this->archived,
            'parent_id' => $this->parentId,
            'parent_type' => $this->parentType,
            'limit' => $this->limit,
            'next_cursor' => $this->nextCursor,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
