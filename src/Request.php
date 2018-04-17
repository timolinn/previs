<?php

namespace PDC;

use Illuminate\Support\Facades\Route as IlluminateRouter;
use Illuminate\Http\Request as IlluminateRequest;

class Request
{

    public $request;

    public function initRequest()
    {
        // scans php globals ($_POST, $_GET, $_GET etc)
        $this->request = IlluminateRequest::createFromGlobals();
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