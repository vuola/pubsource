<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SecretServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load secrets and set them in the configuration
        config([
            'database.connections.mysql.username' => trim(file_get_contents('/secret/mariadb-user')),
            'database.connections.mysql.password' => trim(file_get_contents('/secret/mariadb-password')),
            'database.connections.mysql.database' => trim(file_get_contents('/secret/mariadb-database')),
            // Add other secrets as needed
        ]);
    }

    public function register()
    {
        // ...
    }
}
