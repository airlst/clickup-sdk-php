<?php

namespace ClickUp\V2\Requests\Views;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetViewTasks
 *
 * See all visible tasks in a view in ClickUp.
 */
class GetViewTasks extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/view/{$this->viewId}/task";
	}


	/**
	 * @param string $viewId 105 (string)
	 * @param int $page
	 */
	public function __construct(
		protected string $viewId,
		protected int $page,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
