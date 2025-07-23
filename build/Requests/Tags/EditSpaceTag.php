<?php

namespace ClickUp\V2\Requests\Tags;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * EditSpaceTag
 *
 * Update a task Tag.
 */
class EditSpaceTag extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/v2/space/{$this->spaceId}/tag/{$this->tagName}";
	}


	/**
	 * @param float|int $spaceId
	 * @param string $tagName
	 */
	public function __construct(
		protected float|int $spaceId,
		protected string $tagName,
	) {
	}
}
