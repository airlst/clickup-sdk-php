<?php

namespace ClickUp\V2\Requests\Authorization;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * GetAccessToken
 *
 * These are the routes for authing the API and going through the [OAuth flow](doc:authentication).\
 *
 * \
 * Applications utilizing a personal API token don't use this endpoint.\
 *  \
 * ***Note:** OAuth tokens
 * are not supported when using the [**Try It** feature](doc:trytheapi) of our Reference docs. You
 * can't try this endpoint from your web browser.*
 */
class GetAccessToken extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/oauth/token";
	}


	/**
	 * @param string $clientId Oauth app client id
	 * @param string $clientSecret Oauth app client secret
	 * @param string $code Code given in redirect url
	 */
	public function __construct(
		protected string $clientId,
		protected string $clientSecret,
		protected string $code,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['client_id' => $this->clientId, 'client_secret' => $this->clientSecret, 'code' => $this->code]);
	}
}
