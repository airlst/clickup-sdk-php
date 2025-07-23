<?php

namespace ClickUp\V2\Requests\Docs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * searchDocs
 *
 * View the Docs in your Workspace. You can only view information of Docs you can access.
 */
class SearchDocs extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/docs";
	}


	/**
	 * @param float|int $workspaceId The ID of your Workspace.
	 * @param null|string $id Filter results to a single Doc with the given Doc ID.
	 * @param null|float|int $creator Filter results to Docs created by the user with the given user ID.
	 * @param null|bool $deleted Filter results to return deleted Docs.
	 * @param null|bool $archived Filter results to return archived Docs.
	 * @param null|string $parentId Filter results to children of a parent Doc with the given parent Doc ID.
	 * @param null|string $parentType Filter results to children of the given parent Doc type. For example, `SPACE`, `FOLDER`, `LIST`, `EVERYTHING`, `WORKSPACE`.
	 * @param null|float|int $limit The maximum number of results to retrieve for each page.
	 * @param null|string $nextCursor The cursor to use to get the next page of results.
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
	) {
	}


	public function defaultQuery(): array
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
		]);
	}
}
