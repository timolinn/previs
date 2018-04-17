<?php

namespace PDC;

use Illuminate\Translation\FileLoader;
use Illuminate\Config\Repository;
use Illuminate\Filesystem\Filesystem;

class Config
{

    private $dirPath  = __DIR__;

    /**
     * Config folder name
     *
     * @var string
     */
    protected $locale = 'config';

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
    public function get($configFileName = null): array
    {
        // Set the config filename
        $configFileName = $configFileName != null ?: $this->config;

        // This scans through the locale and loads the config file
        // that ends with .php, Loads and returns the values in an array
        $config = (new FileLoader(new Filesystem, $this->getBasePath()))
                                ->load($this->locale, $configFileName);

        return $config;
    }

    public function getBasePath()
    {
        return realpath($this->dirPath);
    }
}