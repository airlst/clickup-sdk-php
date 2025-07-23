<?php

namespace ClickUp\V2\Requests\Views;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateFolderView
 *
 * Add a List, Board, Calendar, Table, Timeline, Workload, Activity, Map, Chat, or Gantt view to a
 * Folder.
 */
class CreateFolderView extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/folder/{$this->folderId}/view";
	}


	/**
	 * @param float|int $folderId
	 */
	public function __construct(
		protected float|int $folderId,
	) {
	}
}
