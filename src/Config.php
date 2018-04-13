<?php

namespace PDC;

use Illuminate\Translation\FileLoader;
use Illuminate\Config\Repository;
use Illuminate\Filesystem\Filesystem;

class Config
{

    private $dirPath  = __DIR__;

    protected $loader;

    protected $filesys;

    protected $locale = 'config';

    public $config;

    public function __construct($config)
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
        $configFileName = $configFileName != null ?: $this->config;
        $config = (new FileLoader(new Filesystem, $this->getBasePath()))
                                ->load($this->locale, $configFileName);

        return $config;
    }

    public function getBasePath()
    {
        return realpath($this->dirPath);
    }
}