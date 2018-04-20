<?php

namespace PDC;

use Illuminate\Container\Container;
use PDC\Config;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

/**
 * Class Application
 *
 * @author Timolinn
 */
class Application extends Container
{

    protected $basePath;

    public function __construct($basePath)
    {

        if ($basePath) {
            $this->setBasePath($basePath);
        }

        // Load .env vars
        $this->loadEnvironmentVariables();

        $this->registerBaseBindings();

        $this->enableFacades();

        // $request = Request::capture();

        $this->registerServices();

    }

    public function registerBaseBindings()
    {
        static::setInstance($this);

        $this->instance('app', $this);

        $this->instance(Container::class, $this);
    }

    public function registerServices()
    {

        // Bind configurations to IoC
        $this->registerConfig();

        // Bind Request Object
        $this->bind('pdc-request', function() {
            return new \PDC\Request();
        });

        // Register db connection to the container
        $this->singleton('db', function() {
            return \PDC\Connection::make($this->make('config')->get('database'));
        });



    }

    public function registerConfig()
    {
        $this->bind('config', function() {
            return new Config();
        });
    }

    public function resumeService()
    {
        $this->bind('authfactory', function() {
            return new \Aura\Auth\AuthFactory($_COOKIE);
        });

        $this->bind('auth', function() {
            return new \Aura\Auth\Auth((new \Aura\Auth\Session\Segment));
        });

        $adapter = app('connection')->getAuraPDOAdapter();
        $resumeService = app('authfactory')->newResumeService();
        $resumeService->resume(app('auth'));
    }

    public function loadEnvironmentVariables()
    {
        // Load the environment variables from .env file
        $env = new \Dotenv\Dotenv($this->basePath);
        $env->load();
    }

    public function enableFacades()
    {
        \Illuminate\Support\Facades\Facade::setFacadeApplication($this->make('app'));
    }

    public function setBasePath($basePath)
    {
        $this->basePath = rtrim($basePath, '\/');

        $this->bindPathsInContainer();

        return $this;

    }

    public function bindPathsInContainer()
    {
        $this->instance('path.base', $this->basePath());
        $this->instance('path.config', $this->configPath());
    }

    public function basePath($path = '')
    {
        return $this->basePath.DIRECTORY_SEPARATOR.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    public function configPath($path = '')
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'config'.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }


}