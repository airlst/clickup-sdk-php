<?php

declare(strict_types=1);

use ClickUp\V2\Requests\Tasks\GetTask;
use ClickUp\V2\Resource\Tasks;
use ClickUp\V2\Requests\Clients\FetchAllTenantsFormerlyClients;
use ClickUp\V2\ClickUpSDK;
use Saloon\Http\Auth\TokenAuthenticator;

/** @var ClickUp\V2\SDKBuilder\Tests\TestCase $this */
it('sets correct base URL', function (): void {
    expect($this->connector)->toBeInstanceOf(ClickUpSDK::class);
    expect($this->connector->resolveBaseUrl())->toBe('https://api.clickup.com/api');
});

it('handles auth', function (): void {
    $this->connector->withMockClient($this->getMockClient(GetTask::class));

    $resource = new Tasks($this->connector);
    $resource->getTask('123');

    $authenticator = $this->connector->getMockClient()->getLastPendingRequest()->getAuthenticator();

    expect($authenticator)->toBeInstanceOf(TokenAuthenticator::class);
    expect($authenticator->token)->toBe('test-token');
    expect($authenticator->prefix)->toBe('');
});
