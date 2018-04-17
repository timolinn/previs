<?php

namespace PDC;

use Illuminate\Events\EventServiceProvider;
use Illuminate\Routing\RoutingServiceProvider;
use Illuminate\Container\Container;
use PDC\Request;
use Illuminate\Support\Facades\App;

class Router
{

    public $response;

    public static function load(Request $request)
    {
        $router = new static;
        static::registerProviders();

        require realpath(__DIR__.'/../app/routes.php');

        $request->initRequest();

        // Dispatch the http request for handling
        // Sets response on "Router's $response" property
        $request->dispatch($router);

        return $router;
    }

    /**
     * Register EventServiceProvider and RoutingServiceProvider
     *
     * @param Illuminate\Container\Container $app
     * @return void
     */
    public static function registerProviders()
    {
        $app = App::make('app');
        (new \Illuminate\Events\EventServiceProvider($app))->register();
        (new \Illuminate\Routing\RoutingServiceProvider($app))->register();
    }

    public function sendResponse()
    {
        $this->response->send();
    }
}