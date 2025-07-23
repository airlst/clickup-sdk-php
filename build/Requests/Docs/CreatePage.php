<?php

namespace ClickUp\V2\Requests\Docs;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createPage
 *
 * Create a page in a Doc.
 */
class CreatePage extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/docs/{$this->docId}/pages";
	}


	/**
	 * @param float|int $workspaceId The ID of the Workspace.
	 * @param string $docId The ID of the Doc.
	 * @param null|string $parentPageId The ID of the parent page. If this is a root page in the Doc, `parent_page_id` will not be returned.
	 * @param null|string $name The name of the new page.
	 * @param null|string $subTitle The subtitle of the new page.
	 * @param null|string $content The content of the new page.
	 * @param null|string $contentFormat The format the page content is in. For example, `text/md` for markdown or `text/plain` for plain.
	 */
	public function __construct(
		protected float|int $workspaceId,
		protected string $docId,
		protected ?string $parentPageId = null,
		protected ?string $name = null,
		protected ?string $subTitle = null,
		protected ?string $content = null,
		protected ?string $contentFormat = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'parent_page_id' => $this->parentPageId,
			'name' => $this->name,
			'sub_title' => $this->subTitle,
			'content' => $this->content,
			'content_format' => $this->contentFormat,
		]);
	}
}
