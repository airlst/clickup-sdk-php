<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\PrivacyAndAccess;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * UpdatePrivacyAndAccess.
 *
 * Update the privacy and access settings of an object or location in the Workspace. Note that sharing
 * an item may incur charges.
 */
class UpdatePrivacyAndAccess extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    /**
     * @param string     $workspaceId the ID of the Workspace
     * @param string     $objectType  Any object that can be shared in a Workspace. For example, `customField`, `dashboard`, `folder`, `goal`, `goalFolder`,`list`, `space`, `task`, and `view`.
     * @param string     $objectId    the ID of the object to share
     * @param array|null $entries     the user or user group (Team) you wish to give, remove, or edit permissions
     * @param bool|null  $private     the privacy of an object or location
     */
    public function __construct(
        protected string $workspaceId,
        protected string $objectType,
        protected string $objectId,
        protected ?array $entries = null,
        protected ?bool $private = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v3/workspaces/{$this->workspaceId}/{$this->objectType}/{$this->objectId}/acls";
    }

    public function defaultBody(): array
    {
        return array_filter(['entries' => $this->entries, 'private' => $this->private]);
    }
}
