<?php

namespace PDC;

use Illuminate\Events\EventServiceProvider;
use Illuminate\Routing\RoutingServiceProvider;
use Illuminate\Container\Container;

class Router
{

    public function load(Request $request)
    {
        $this->registerProviders();
    }

    /**
     * Register EventServiceProvider and RoutingServiceProvider
     *
     * @param Illuminate\Container\Container $app
     * @return void
     */
    public function registerProviders(Container $app)
    {
        (new Illuminate\Events\EventServiceProvider($app))->register();
        (new Illuminate\Routing\RoutingServiceProvider($app))->register();
    }
}