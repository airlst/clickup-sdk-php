<?php

namespace ClickUp\V2\Requests\Folders;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateFolderFromTemplate
 *
 * Create a new Folder using a Folder template within a Space. This endpoint allows you to create a
 * folder with all its nested assets (lists, tasks, etc.) from a predefined template.
 * This request can
 * be run asynchronously or synchronously via the `return_immediately` parameter.
 */
class CreateFolderFromTemplate extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/space/{$this->spaceId}/folder_template/{$this->templateId}";
	}


	/**
	 * @param string $spaceId ID of the Space where the Folder will be created
	 * @param string $templateId ID of the Folder template to use.
	 */
	public function __construct(
		protected string $spaceId,
		protected string $templateId,
	) {
	}
}
