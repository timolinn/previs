<?php

// Application basepath
$basePath = realpath(__DIR__.'/../../');

// Load the environment variables from .env file
$env = new Dotenv\Dotenv($basePath);
$env->load();

// A better way would be to Create this applications Instance
// extending Illuminate\Container
// but for now. Instantiate only Illuminate Cotainer
// Instantiante IoC container
$app = new Illuminate\Container\Container($basePath);
$app->singleton('app', function() use ($app) {
    return $app;
});

$app->singleton('db', function() {
    return PDC\Connection::make((new PDC\Config('database'))->get());
});

// Make DB instance available globally via static methods
// $app->make('db')->setAsGlobal();

// get connection
// $app->make('db')->getConnection();

// Initailize ELoquent ORM
$app->make('db')->bootEloquent();

// App\Models\Role::create([
//     'title' => 'user'
// ]);

// $user = App\User::create([
//     'user_name' => 'jimm_',
//     'first_name' => 'Jim',
//     'last_name' => 'Farley',
//     'role_id' => 2,
//     'email' => 'jim@gmail.com',
//     'phone_number' => '08130997771',
//     'password' => password_hash('password', PASSWORD_BCRYPT)
// ]);
