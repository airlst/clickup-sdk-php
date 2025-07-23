<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Goals\CreateGoal;
use ClickUp\V2\Requests\Goals\CreateKeyResult;
use ClickUp\V2\Requests\Goals\DeleteGoal;
use ClickUp\V2\Requests\Goals\DeleteKeyResult;
use ClickUp\V2\Requests\Goals\EditKeyResult;
use ClickUp\V2\Requests\Goals\GetGoal;
use ClickUp\V2\Requests\Goals\GetGoals;
use ClickUp\V2\Requests\Goals\UpdateGoal;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Goals extends Resource
{
	/**
	 * @param float|int $teamId Workspace ID
	 * @param bool $includeCompleted
	 */
	public function getGoals(float|int $teamId, ?bool $includeCompleted = null): Response
	{
		return $this->connector->send(new GetGoals($teamId, $includeCompleted));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function createGoal(float|int $teamId): Response
	{
		return $this->connector->send(new CreateGoal($teamId));
	}


	/**
	 * @param string $goalId 900e-462d-a849-4a216b06d930 (uuid)
	 */
	public function getGoal(string $goalId): Response
	{
		return $this->connector->send(new GetGoal($goalId));
	}


	/**
	 * @param string $goalId 900e-462d-a849-4a216b06d930 (uuid)
	 */
	public function updateGoal(string $goalId): Response
	{
		return $this->connector->send(new UpdateGoal($goalId));
	}


	/**
	 * @param string $goalId 900e-462d-a849-4a216b06d930 (uuid)
	 */
	public function deleteGoal(string $goalId): Response
	{
		return $this->connector->send(new DeleteGoal($goalId));
	}


	/**
	 * @param string $goalId 900e-462d-a849-4a216b06d930 (uuid)
	 */
	public function createKeyResult(string $goalId): Response
	{
		return $this->connector->send(new CreateKeyResult($goalId));
	}


	/**
	 * @param string $keyResultId 8480-49bc-8c57-e569747efe93 (uuid)
	 */
	public function editKeyResult(string $keyResultId): Response
	{
		return $this->connector->send(new EditKeyResult($keyResultId));
	}


	/**
	 * @param string $keyResultId 8480-49bc-8c57-e569747efe93 (uuid)
	 */
	public function deleteKeyResult(string $keyResultId): Response
	{
		return $this->connector->send(new DeleteKeyResult($keyResultId));
	}
}
