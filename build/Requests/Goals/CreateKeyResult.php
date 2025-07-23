<?php

namespace ClickUp\V2\Requests\Goals;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateKeyResult
 *
 * Add a Target to a Goal.
 */
class CreateKeyResult extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/goal/{$this->goalId}/key_result";
	}


	/**
	 * @param string $goalId 900e-462d-a849-4a216b06d930 (uuid)
	 */
	public function __construct(
		protected string $goalId,
	) {
	}
}
