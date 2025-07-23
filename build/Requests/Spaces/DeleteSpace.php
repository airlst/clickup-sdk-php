<?php

namespace ClickUp\V2\Requests\Spaces;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteSpace
 *
 * Delete a Space from your Workspace.
 */
class DeleteSpace extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v2/space/{$this->spaceId}";
	}


	/**
	 * @param float|int $spaceId
	 */
	public function __construct(
		protected float|int $spaceId,
	) {
	}
}
