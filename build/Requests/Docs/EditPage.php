<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Docs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * editPage.
 *
 * Edit a page in a Doc.
 */
class EditPage extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param float|int   $workspaceId     the ID of the Workspace
     * @param string      $docId           the ID of the Doc
     * @param string      $pageId          the ID of the page
     * @param string|null $name            the updated name of the page
     * @param string|null $subTitle        the updated subtitle of the page
     * @param string|null $content         the updated content of the page
     * @param string|null $contentEditMode The strategy for updating content on the page. For example, `replace`, `append`, or `prepend`.
     * @param string|null $contentFormat   The format the page content is in. For example, `text/md` for markdown and `text/plain` for plain.
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
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/docs/{$this->docId}/pages/{$this->pageId}";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'sub_title' => $this->subTitle,
            'content' => $this->content,
            'content_edit_mode' => $this->contentEditMode,
            'content_format' => $this->contentFormat,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
