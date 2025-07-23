<?php

declare(strict_types=1);

namespace ClickUp\V2\SDKBuilder\Providers;

use Illuminate\Support\ServiceProvider;
use Override;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}

    /**
     * Register any application services.
     */
    #[Override]
    public function register(): void {}
}
