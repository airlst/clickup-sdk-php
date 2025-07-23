<?php

namespace ClickUp\V2\Requests\TimeTracking;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Changetagnamesfromtimeentries
 *
 * Rename an time entry label.
 */
class Changetagnamesfromtimeentries extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/v2/team/{$this->teamId}/time_entries/tags";
	}


	/**
	 * @param float|int $teamId Workspace ID
	 * @param string $name
	 * @param string $newName
	 * @param string $tagBg
	 * @param string $tagFg
	 */
	public function __construct(
		protected float|int $teamId,
		protected string $name,
		protected string $newName,
		protected string $tagBg,
		protected string $tagFg,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['name' => $this->name, 'new_name' => $this->newName, 'tag_bg' => $this->tagBg, 'tag_fg' => $this->tagFg]);
	}
}
