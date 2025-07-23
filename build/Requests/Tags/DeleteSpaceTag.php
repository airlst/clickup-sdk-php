<?php

namespace ClickUp\V2\Requests\Tags;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteSpaceTag
 *
 * Delete a task Tag from a Space.
 */
class DeleteSpaceTag extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v2/space/{$this->spaceId}/tag/{$this->tagName}";
	}


	/**
	 * @param float|int $spaceId
	 * @param string $tagName
	 * @param array $tag
	 */
	public function __construct(
		protected float|int $spaceId,
		protected string $tagName,
		protected array $tag,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['tag' => $this->tag]);
	}
}
