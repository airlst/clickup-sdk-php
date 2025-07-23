<?php

namespace ClickUp\V2\Requests\SharedHierarchy;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * SharedHierarchy
 *
 * View the tasks, Lists, and Folders that have been shared with the authenticated user.
 */
class SharedHierarchy extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/shared";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function __construct(
		protected float|int $teamId,
	) {
	}
}
