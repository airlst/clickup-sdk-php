<?php

declare(strict_types=1);

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\TaskRelationships\AddDependency;
use ClickUp\V2\Requests\TaskRelationships\AddTaskLink;
use ClickUp\V2\Requests\TaskRelationships\DeleteDependency;
use ClickUp\V2\Requests\TaskRelationships\DeleteTaskLink;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class TaskRelationships extends Resource
{
    /**
     * @param string    $taskId        this is the task which is waiting on or blocking another task
     * @param bool      $customTaskIds if you want to reference a task by it's custom task id, this value must be `true`
     * @param float|int $teamId        When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
     *                                 \
     *                                 For example: `custom_task_ids=true&team_id=123`.
     */
    public function addDependency(
        string $taskId,
        ?string $dependsOn = null,
        ?string $depedencyOf = null,
        ?bool $customTaskIds = null,
        float|int|null $teamId = null,
    ): Response {
        return $this->connector->send(new AddDependency($taskId, $dependsOn, $depedencyOf, $customTaskIds, $teamId));
    }

    /**
     * @param bool      $customTaskIds if you want to reference a task by it's custom task id, this value must be `true`
     * @param float|int $teamId        When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
     *                                 \
     *                                 For example: `custom_task_ids=true&team_id=123`.
     */
    public function deleteDependency(
        string $taskId,
        string $dependsOn,
        string $dependencyOf,
        ?bool $customTaskIds = null,
        float|int|null $teamId = null,
    ): Response {
        return $this->connector->send(new DeleteDependency($taskId, $dependsOn, $dependencyOf, $customTaskIds, $teamId));
    }

    /**
     * @param string    $taskId        the task to initiate the link from
     * @param string    $linksTo       the task to link to
     * @param bool      $customTaskIds if you want to reference a task by it's custom task id, this value must be `true`
     * @param float|int $teamId        When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
     *                                 \
     *                                 For example: `custom_task_ids=true&team_id=123`.
     */
    public function addTaskLink(
        string $taskId,
        string $linksTo,
        ?bool $customTaskIds = null,
        float|int|null $teamId = null,
    ): Response {
        return $this->connector->send(new AddTaskLink($taskId, $linksTo, $customTaskIds, $teamId));
    }

    /**
     * @param bool      $customTaskIds if you want to reference a task by it's custom task id, this value must be `true`
     * @param float|int $teamId        When the `custom_task_ids` parameter is set to `true`, the Workspace ID must be provided using the `team_id` parameter.
     *                                 \
     *                                 For example: `custom_task_ids=true&team_id=123`.
     */
    public function deleteTaskLink(
        string $taskId,
        string $linksTo,
        ?bool $customTaskIds = null,
        float|int|null $teamId = null,
    ): Response {
        return $this->connector->send(new DeleteTaskLink($taskId, $linksTo, $customTaskIds, $teamId));
    }
}
