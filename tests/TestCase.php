<?php

declare(strict_types=1);

namespace Tests;

use Laravel\Fortify\FortifyServiceProvider;
use PreemStudio\Jetpack\Tests\AbstractTestCase;
use PreemStudio\MagicLinks\ServiceProvider;
use Spatie\LaravelData\LaravelDataServiceProvider;

abstract class TestCase extends AbstractTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelDataServiceProvider::class,
            FortifyServiceProvider::class,
            ServiceProvider::class,
        ];
    }
}
