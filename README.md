# ClickUp API V2 PHP SDK

This package provides a PHP SDK for the ClickUp API V2, allowing developers to easily integrate ClickUp's services into their
applications. It is built
using [ClickUp's official OpenAPI specifications](https://developer.clickup.com/openapi/673cf4cfdca96a0019533cad) and is built
with the help of [crescat-io/saloon-sdk-generator](https://github.com/crescat-io/saloon-sdk-generator) tool.

## Installation

```bash
composer require airlst/clickup-sdk-php
```

## Usage

```php
use ClickUp\V2\ClickUpSDK;

$connector = new ClickUpSDK(
    config('services.clickup.customer'),
    config('services.clickup.username'),
    config('services.clickup.password'),
);

$response = $connector->clients()->fetchAllTenantsFormerlyClients();
```

## Contributing

If you want to contribute to this SDK, you can generate the SDK from the fresh OpenAPI specification using the following
command:

```bash
php application build
```

## Links

- [ClickUp API V2 Documentation](https://developer.clickup.com/docs/index)
- [Saloon library](https://docs.saloon.dev)
