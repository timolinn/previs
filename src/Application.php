<?php

namespace PDC;

use Illuminate\Container\Container;
use PDC\Config;

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

        // Register db connection to the container
        $this->singleton('db', function() {
            return PDC\Connection::make((new PDC\Config('database'))->get());
        });

    }

    public function registerBaseBindings()
    {
        static::setInstance($this);

        $this->instance('app', $this);

        $this->instance(Container::class, $this);
    }

    public function loadEnvironmentVariables()
    {
        // Load the environment variables from .env file
        $env = new Dotenv\Dotenv($this->basePath);
        $env->load();
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
        return $this->basePath.DIRECTORY_SEPERATOR.($path ? DIRECTORY_SEPERATOR.$path : $path);
    }

    public function configPath($path = '')
    {
        return $this->basePath.DIRECTORY_SEPERATOR.'src'.DIRECTORY_SEPERATOR.'config'.($path ? DIRECTORY_SEPERATOR.$path : $path);
    }


}