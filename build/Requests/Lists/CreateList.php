<?php

namespace ClickUp\V2\Requests\Lists;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateList
 *
 * Add a new List to a Folder.
 */
class CreateList extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/folder/{$this->folderId}/list";
	}


	/**
	 * @param float|int $folderId
	 */
	public function __construct(
		protected float|int $folderId,
	) {
	}
}
