<?php

namespace Heychazza\SingleStoreDriver;

use Heychazza\SingleStoreDriver\Blueprint\SingleStoreBlueprint;
use Illuminate\Database\Connection;
use Illuminate\Database\Connectors\MySqlConnector;
use Illuminate\Database\Schema\Blueprint;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SingleStoreDriverServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('singlestore-driver');
    }

    public function register()
    {
        Connection::resolverFor('singlestore', function ($connection, $database, $prefix, $config) {
            $connector = new MySqlConnector();
            $connection = $connector->connect($config);

            return new SingleStoreConnection($connection, $database, $prefix, $config);
        });
    }

    public function boot()
    {
        $this->app->bind(Blueprint::class, SingleStoreBlueprint::class);
    }
}
