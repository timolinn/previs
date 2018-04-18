<?php

// Application basepath
$basePath = realpath(__DIR__.'/../../');

// Instantiate new Previs App
$app = new \PDC\Application($basePath);

// Make DB instance available globally via static methods
// $app->make('db')->setAsGlobal();

// get connection
// $app->make('db')->getConnection();

// Initailize ELoquent ORM
$app->make('db')->bootEloquent();


$request = Request::capture();
$app->instance('Illuminate\Http\Request', $request);
