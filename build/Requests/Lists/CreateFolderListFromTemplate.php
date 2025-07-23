<?php

namespace ClickUp\V2\Requests\Lists;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateFolderListFromTemplate
 *
 * Create a new list using a list template in a folder
 * This request runs synchronously by default with
 * `return_immediately=true`. The request returns the future List ID immediatly, but the List might not
 * created at the time of the request returning.
 * Small temmplates can be applied syncronously, which
 * guarantees that all sub objects are created. In case of a timeout on syncronous requests, the of
 * objects from the template will continue to be created past the timeout.
 */
class CreateFolderListFromTemplate extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/folder/{$this->folderId}/list_template/{$this->templateId}";
	}


	/**
	 * @param string $folderId ID of the Folder where the List will be created
	 * @param string $templateId ID of the template to use
	 */
	public function __construct(
		protected string $folderId,
		protected string $templateId,
	) {
	}
}
