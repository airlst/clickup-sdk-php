<?php

declare(strict_types=1);

namespace ClickUp\V2;

use ClickUp\V2\Resource\Attachments;
use ClickUp\V2\Resource\Authorization;
use ClickUp\V2\Resource\Comments;
use ClickUp\V2\Resource\CustomFields;
use ClickUp\V2\Resource\CustomTaskTypes;
use ClickUp\V2\Resource\Folders;
use ClickUp\V2\Resource\Goals;
use ClickUp\V2\Resource\Guests;
use ClickUp\V2\Resource\Lists;
use ClickUp\V2\Resource\Members;
use ClickUp\V2\Resource\Roles;
use ClickUp\V2\Resource\SharedHierarchy;
use ClickUp\V2\Resource\Spaces;
use ClickUp\V2\Resource\Tags;
use ClickUp\V2\Resource\TaskChecklists;
use ClickUp\V2\Resource\TaskRelationships;
use ClickUp\V2\Resource\Tasks;
use ClickUp\V2\Resource\Templates;
use ClickUp\V2\Resource\TimeTracking;
use ClickUp\V2\Resource\TimeTrackingLegacy;
use ClickUp\V2\Resource\UserGroups;
use ClickUp\V2\Resource\Users;
use ClickUp\V2\Resource\Views;
use ClickUp\V2\Resource\Webhooks;
use ClickUp\V2\Resource\Workspaces;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

/**
 * ClickUp API v2 Reference.
 *
 * The ClickUp API enables you to programmatically access and manage your ClickUp resources.
 *
 * ## Authentication
 * The API supports two authentication methods:
 * - **Personal API Token**: Use for testing and personal integrations. Add token to requests with header: `Authorization: pk_...`
 * - **OAuth 2.0**: Required for building apps for other users. Uses authorization code flow.
 *
 * ## Getting Started
 * Our [Getting Started Guide](https://developer.clickup.com/docs/index) provides a comprehensive overview of how to use the ClickUp API.
 */
class ClickUpSDK extends Connector
{
    use AlwaysThrowOnErrors;

    public function __construct(
        protected readonly string $personalToken,
    ) {}

    public function resolveBaseUrl(): string
    {
        return 'https://api.clickup.com/api';
    }

    public function attachments(): Attachments
    {
        return new Attachments($this);
    }

    public function authorization(): Authorization
    {
        return new Authorization($this);
    }

    public function comments(): Comments
    {
        return new Comments($this);
    }

    public function customFields(): CustomFields
    {
        return new CustomFields($this);
    }

    public function customTaskTypes(): CustomTaskTypes
    {
        return new CustomTaskTypes($this);
    }

    public function folders(): Folders
    {
        return new Folders($this);
    }

    public function goals(): Goals
    {
        return new Goals($this);
    }

    public function guests(): Guests
    {
        return new Guests($this);
    }

    public function lists(): Lists
    {
        return new Lists($this);
    }

    public function members(): Members
    {
        return new Members($this);
    }

    public function roles(): Roles
    {
        return new Roles($this);
    }

    public function sharedHierarchy(): SharedHierarchy
    {
        return new SharedHierarchy($this);
    }

    public function spaces(): Spaces
    {
        return new Spaces($this);
    }

    public function tags(): Tags
    {
        return new Tags($this);
    }

    public function taskChecklists(): TaskChecklists
    {
        return new TaskChecklists($this);
    }

    public function taskRelationships(): TaskRelationships
    {
        return new TaskRelationships($this);
    }

    public function tasks(): Tasks
    {
        return new Tasks($this);
    }

    public function templates(): Templates
    {
        return new Templates($this);
    }

    public function timeTracking(): TimeTracking
    {
        return new TimeTracking($this);
    }

    public function timeTrackingLegacy(): TimeTrackingLegacy
    {
        return new TimeTrackingLegacy($this);
    }

    public function userGroups(): UserGroups
    {
        return new UserGroups($this);
    }

    public function users(): Users
    {
        return new Users($this);
    }

    public function views(): Views
    {
        return new Views($this);
    }

    public function webhooks(): Webhooks
    {
        return new Webhooks($this);
    }

    public function workspaces(): Workspaces
    {
        return new Workspaces($this);
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->personalToken, '');
    }
}
