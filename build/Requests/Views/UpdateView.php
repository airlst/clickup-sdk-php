<?php

namespace ClickUp\V2\Requests\Views;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateView
 *
 * Rename a view, update the grouping, sorting, filters, columns, and settings of a view.
 */
class UpdateView extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/v2/view/{$this->viewId}";
	}


	/**
	 * @param string $viewId
	 */
	public function __construct(
		protected string $viewId,
	) {
	}
}
