<?php

declare(strict_types=1);

namespace ClickUp\V2;

use Saloon\Http\Connector;

class Resource
{
    public function __construct(
        protected Connector $connector,
    ) {}
}
