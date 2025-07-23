<?php

namespace ClickUp\V2\Requests\Goals;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteKeyResult
 *
 * Delete a target from a Goal.
 */
class DeleteKeyResult extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v2/key_result/{$this->keyResultId}";
	}


	/**
	 * @param string $keyResultId 8480-49bc-8c57-e569747efe93 (uuid)
	 */
	public function __construct(
		protected string $keyResultId,
	) {
	}
}
