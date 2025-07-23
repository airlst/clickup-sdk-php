<?php

namespace ClickUp\V2\Requests\Spaces;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetSpaces
 *
 * View the Spaces avialable in a Workspace. You can only get member info in private Spaces.
 */
class GetSpaces extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/space";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param null|bool $archived
	 */
	public function __construct(
		protected float|int $teamId,
		protected ?bool $archived = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['archived' => $this->archived]);
	}
}
