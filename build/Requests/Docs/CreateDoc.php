<?php

namespace ClickUp\V2\Requests\Docs;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createDoc
 *
 * Create a new Doc.
 */
class CreateDoc extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/docs";
	}


	/**
	 * @param float|int $workspaceId The ID of the Workspace.
	 * @param null|string $name The name of the new Doc.
	 * @param null|mixed $parent The parent of the new Doc.
	 * @param null|string $visibility The visibility of the new Doc. For example, `PUBLIC` or `PRIVATE`.
	 * @param null|bool $createPage Create a new page when creating the Doc.
	 */
	public function __construct(
		protected float|int $workspaceId,
		protected ?string $name = null,
		protected mixed $parent = null,
		protected ?string $visibility = null,
		protected ?bool $createPage = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'name' => $this->name,
			'parent' => $this->parent,
			'visibility' => $this->visibility,
			'create_page' => $this->createPage,
		]);
	}
}
