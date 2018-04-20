<?php

namespace App\Providers;

class ServiceProvider
{

    /**
     * PDC Application Instance
     *
     * @var PDC\Application
     */
    protected $app;

    public function __construct()
    {
        $this->app = app('app');
    }
}