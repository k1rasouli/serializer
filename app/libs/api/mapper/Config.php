<?php

namespace App\libs\api\mapper;

use Symfony\Component\Yaml\Yaml;

class Config
{
    private array $configurationArray;

    /**
     * Load YAML configuration file with using Symfony's Yaml library into array
     */
    public function __construct()
    {
        $this->configurationArray = Yaml::parseFile(base_path('serialization_config.yaml'));
    }

    /**
     * @param $modelPath
     * @return array
     *
     * Load Model related configuration by model path
     */
    protected function loadModelConfiguration($modelPath) : array
    {
        return $this->configurationArray[$modelPath];
    }
}
