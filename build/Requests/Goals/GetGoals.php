<?php

namespace ClickUp\V2\Requests\Goals;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetGoals
 *
 * View the Goals available in a Workspace.
 */
class GetGoals extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/goal";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param null|bool $includeCompleted
	 */
	public function __construct(
		protected float|int $teamId,
		protected ?bool $includeCompleted = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['include_completed' => $this->includeCompleted]);
	}
}
