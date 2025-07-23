<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Webhooks\CreateWebhook;
use ClickUp\V2\Requests\Webhooks\DeleteWebhook;
use ClickUp\V2\Requests\Webhooks\GetWebhooks;
use ClickUp\V2\Requests\Webhooks\UpdateWebhook;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Webhooks extends Resource
{
	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function getWebhooks(float|int $teamId): Response
	{
		return $this->connector->send(new GetWebhooks($teamId));
	}


	/**
	 * @param float|int $teamId Workspace ID
	 */
	public function createWebhook(float|int $teamId): Response
	{
		return $this->connector->send(new CreateWebhook($teamId));
	}


	/**
	 * @param string $webhookId e506-4a29-9d42-26e504e3435e (uuid)
	 */
	public function updateWebhook(string $webhookId): Response
	{
		return $this->connector->send(new UpdateWebhook($webhookId));
	}


	/**
	 * @param string $webhookId e506-4a29-9d42-26e504e3435e (uuid)
	 */
	public function deleteWebhook(string $webhookId): Response
	{
		return $this->connector->send(new DeleteWebhook($webhookId));
	}
}
