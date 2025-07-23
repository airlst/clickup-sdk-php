<?php

namespace ClickUp\V2\Requests\Spaces;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateSpace
 *
 * Add a new Space to a Workspace.
 */
class CreateSpace extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/space";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param string $name
	 * @param bool $multipleAssignees
	 * @param array $features
	 */
	public function __construct(
		protected float|int $teamId,
		protected string $name,
		protected bool $multipleAssignees,
		protected array $features,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['name' => $this->name, 'multiple_assignees' => $this->multipleAssignees, 'features' => $this->features]);
	}
}
