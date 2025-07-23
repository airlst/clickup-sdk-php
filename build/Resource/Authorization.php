<?php

namespace ClickUp\V2\Resource;

use ClickUp\V2\Requests\Authorization\GetAccessToken;
use ClickUp\V2\Requests\Authorization\GetAuthorizedTeams;
use ClickUp\V2\Requests\Authorization\GetAuthorizedUser;
use ClickUp\V2\Resource;
use Saloon\Http\Response;

class Authorization extends Resource
{
	/**
	 * @param string $clientId Oauth app client id
	 * @param string $clientSecret Oauth app client secret
	 * @param string $code Code given in redirect url
	 */
	public function getAccessToken(string $clientId, string $clientSecret, string $code): Response
	{
		return $this->connector->send(new GetAccessToken($clientId, $clientSecret, $code));
	}


	public function getAuthorizedUser(): Response
	{
		return $this->connector->send(new GetAuthorizedUser());
	}


	public function getAuthorizedTeams(): Response
	{
		return $this->connector->send(new GetAuthorizedTeams());
	}
}
