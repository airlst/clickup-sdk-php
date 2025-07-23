<?php

namespace ClickUp\V2\Requests\Tasks;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateTaskFromTemplate
 *
 * Create a new task using a task template.
 */
class CreateTaskFromTemplate extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/list/{$this->listId}/taskTemplate/{$this->templateId}";
	}


	/**
	 * @param float|int $listId
	 * @param string $templateId
	 */
	public function __construct(
		protected float|int $listId,
		protected string $templateId,
	) {
	}
}
