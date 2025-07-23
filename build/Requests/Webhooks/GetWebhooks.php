<?php

namespace ClickUp\V2\Requests\Webhooks;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetWebhooks
 *
 * View the webhooks created via the API for a Workspace. This endpoint returns webhooks created by the
 * authenticated user.
 */
class GetWebhooks extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/webhook";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function __construct(
		protected float|int $teamId,
	) {
	}
}
