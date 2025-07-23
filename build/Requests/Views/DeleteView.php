<?php

namespace ClickUp\V2\Requests\Views;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteView
 */
class DeleteView extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v2/view/{$this->viewId}";
	}


	/**
	 * @param string $viewId 105 (string)
	 */
	public function __construct(
		protected string $viewId,
	) {
	}
}
