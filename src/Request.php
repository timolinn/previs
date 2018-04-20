<?php

namespace PDC;

use Illuminate\Support\Facades\Route as IlluminateRouter;
use Illuminate\Http\Request as IlluminateRequest;

class Request extends IlluminateRequest
{

    /**
     * Instance of Illuminate\Request with captured globals
     *
     * @var Illuminate\Http\Request
     */
    public $request;

    public function initRequest($app)
    {
        // scans php globals ($_POST, $_GET, $_GET etc)
        $this->request = static::capture();

        // bind request to Ioc. THis makes the current request parameters
        // accessible from the controller
        $app->instance('PDC\Request', $this);


    }

    public function dispatch($router)
    {
        try {

            $router->response = IlluminateRouter::dispatch($this->request);
        } catch (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e) {
            die('Route not Found! You lost your way Darn it!!');
        }
    }

}