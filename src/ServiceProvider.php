<?php

declare(strict_types=1);

namespace PreemStudio\MagicLinks;

use PreemStudio\Jetpack\Package\AbstractServiceProvider;
use PreemStudio\Jetpack\Package\Package;

final class ServiceProvider extends AbstractServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-magic-links')
            ->hasRoute('web');
    }
}
