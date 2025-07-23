<?php

namespace ClickUp\V2\Requests\Tags;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateSpaceTag
 *
 * Add a new task Tag to a Space.
 */
class CreateSpaceTag extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/space/{$this->spaceId}/tag";
	}


	/**
	 * @param float|int $spaceId
	 */
	public function __construct(
		protected float|int $spaceId,
	) {
	}
}
