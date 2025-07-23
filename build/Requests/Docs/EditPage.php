<?php

namespace ClickUp\V2\Requests\Docs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * editPage
 *
 * Edit a page in a Doc.
 */
class EditPage extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/v3/workspaces/{$this->workspaceId}/docs/{$this->docId}/pages/{$this->pageId}";
	}


	/**
	 * @param float|int $workspaceId The ID of the Workspace.
	 * @param string $docId The ID of the Doc.
	 * @param string $pageId The ID of the page.
	 * @param null|string $name The updated name of the page.
	 * @param null|string $subTitle The updated subtitle of the page.
	 * @param null|string $content The updated content of the page.
	 * @param null|string $contentEditMode The strategy for updating content on the page. For example, `replace`, `append`, or `prepend`.
	 * @param null|string $contentFormat The format the page content is in. For example, `text/md` for markdown and `text/plain` for plain.
	 */
	public function __construct(
		protected float|int $workspaceId,
		protected string $docId,
		protected string $pageId,
		protected ?string $name = null,
		protected ?string $subTitle = null,
		protected ?string $content = null,
		protected ?string $contentEditMode = null,
		protected ?string $contentFormat = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'name' => $this->name,
			'sub_title' => $this->subTitle,
			'content' => $this->content,
			'content_edit_mode' => $this->contentEditMode,
			'content_format' => $this->contentFormat,
		]);
	}
}
