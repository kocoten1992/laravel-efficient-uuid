<?php

namespace Dyrynda\Database;

use Dyrynda\Database\Connection\MySqlConnection;
use Illuminate\Database\Connection;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class LaravelEfficientUuidServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Connection::resolverFor('mysql', function ($connection, $database, $prefix, $config) {
            return new MySqlConnection($connection, $database, $prefix, $config);
        });

        Blueprint::macro('efficientUuid', function ($column) {
            $this->addColumn('efficientUuid', $column);
        });
    }
}
