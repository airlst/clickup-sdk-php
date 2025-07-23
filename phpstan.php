<?php

declare(strict_types=1);

$factory = new Airlst\PhpstanConfig\Factory([
    'app',
    'bootstrap',
    'build',
    'config',
    // 'tests',
]);

return $factory
    ->withBleedingEdge()
    ->level(8)
    ->useCacheDir('storage/framework/cache/phpstan')
    ->ignoreError('arrayFilter.strict')
    ->ignoreError('missingType.iterableValue')
    ->create();
