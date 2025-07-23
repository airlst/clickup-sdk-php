<?php

namespace ClickUp\V2\Requests\Templates;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetTaskTemplates
 *
 * View the task templates available in a Workspace.
 */
class GetTaskTemplates extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/taskTemplate";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param int $page
	 */
	public function __construct(
		protected float|int $teamId,
		protected int $page,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
