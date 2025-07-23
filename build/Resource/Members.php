<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Members\GetListMembers;
use ClickUp\V2\Requests\Members\GetTaskMembers;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Members extends Resource
{
	/**
	 * @param string $taskId
	 */
	public function getTaskMembers(string $taskId): Response
	{
		return $this->connector->send(new GetTaskMembers($taskId));
	}


	/**
	 * @param float|int $listId
	 */
	public function getListMembers(float|int $listId): Response
	{
		return $this->connector->send(new GetListMembers($listId));
	}
}
