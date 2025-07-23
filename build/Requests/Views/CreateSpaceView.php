<?php

namespace ClickUp\V2\Requests\Views;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateSpaceView
 *
 * Add a List, Board, Calendar, Table, Timeline, Workload, Activity, Map, Chat, or Gantt view to a
 * Space.
 */
class CreateSpaceView extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/space/{$this->spaceId}/view";
	}


	/**
	 * @param float|int $spaceId
	 */
	public function __construct(
		protected float|int $spaceId,
	) {
	}
}
