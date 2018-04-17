<?php

namespace PDC;

use Illuminate\Translation\FileLoader;
use Illuminate\Config\Repository;
use Illuminate\Filesystem\Filesystem;

class Config
{

    /**
     * Config folder name
     *
     * @var string
     */
    protected $locale = 'src/config';

    public $config;

    public function __construct($config = '')
    {
        $this->config = $config;
    }

    /**
     * Returns an array from the config file
     *
     * @param string $configFileName
     * @return array|string
     */
    public function get($configFileName = ''): array
    {
        // Set the config filename
        $configFileName = $configFileName != '' ? $configFileName : $this->config;

        // This scans through the locale and loads the config file
        // that ends with .php, Loads and returns the values in an array
        $config = (new FileLoader(new Filesystem, $this->getBasePath()))
                                ->load($this->locale, $configFileName);

        return $config;
    }

    public function getBasePath()
    {
        return app('path.base');
    }
}