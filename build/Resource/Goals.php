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
	 * @param string $name
	 * @param int $dueDate
	 * @param string $description
	 * @param bool $multipleOwners
	 * @param array $owners Array of user IDs.
	 * @param string $color
	 */
	public function createGoal(
		float|int $teamId,
		string $name,
		int $dueDate,
		string $description,
		bool $multipleOwners,
		array $owners,
		string $color,
	): Response
	{
		return $this->connector->send(new CreateGoal($teamId, $name, $dueDate, $description, $multipleOwners, $owners, $color));
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
	 * @param string $name
	 * @param int $dueDate
	 * @param string $description
	 * @param array $remOwners Array of user IDs.
	 * @param array $addOwners Array of user IDs.
	 * @param string $color
	 */
	public function updateGoal(
		string $goalId,
		string $name,
		int $dueDate,
		string $description,
		array $remOwners,
		array $addOwners,
		string $color,
	): Response
	{
		return $this->connector->send(new UpdateGoal($goalId, $name, $dueDate, $description, $remOwners, $addOwners, $color));
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
	 * @param string $name
	 * @param array $owners
	 * @param string $type Target (key result) types include: `number`, `currency`, `boolean`, `percentage`, or `automatic`.
	 * @param int $stepsStart
	 * @param int $stepsEnd
	 * @param string $unit
	 * @param array $taskIds Enter an array of task IDs to link this target with one or more tasks.
	 * @param array $listIds Enter an array of List IDs to link this target with one or more Lists.
	 */
	public function createKeyResult(
		string $goalId,
		string $name,
		array $owners,
		string $type,
		int $stepsStart,
		int $stepsEnd,
		string $unit,
		array $taskIds,
		array $listIds,
	): Response
	{
		return $this->connector->send(new CreateKeyResult($goalId, $name, $owners, $type, $stepsStart, $stepsEnd, $unit, $taskIds, $listIds));
	}


	/**
	 * @param string $keyResultId 8480-49bc-8c57-e569747efe93 (uuid)
	 * @param int $stepsCurrent
	 * @param string $note
	 */
	public function editKeyResult(string $keyResultId, int $stepsCurrent, string $note): Response
	{
		return $this->connector->send(new EditKeyResult($keyResultId, $stepsCurrent, $note));
	}


	/**
	 * @param string $keyResultId 8480-49bc-8c57-e569747efe93 (uuid)
	 */
	public function deleteKeyResult(string $keyResultId): Response
	{
		return $this->connector->send(new DeleteKeyResult($keyResultId));
	}
}
