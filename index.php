<?php

require 'vendor/autoload.php';

// Boot up the app
require 'src/app/bootstrap.php';

// initiate route
// Router::load(new PDC\Request());

with(new Illuminate\Events\EventServiceProvider($app))->register();
with(new Illuminate\Routing\RoutingServiceProvider($app))->register();

require $basePath . '/app/routes.php';

$request = Illuminate\Http\Request::createFromGlobals();
$response = $app->make('router')->dispatch($request);

$response->send();