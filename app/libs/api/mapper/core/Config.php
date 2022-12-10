<?php

namespace App\libs\api\mapper\core;

use Symfony\Component\Yaml\Yaml;

class Config
{
    private array $configurationArray; //This variable is used for required configuration from yaml file based on model

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
    public function loadModelConfiguration($modelPath): array
    {
        return $this->configurationArray[$modelPath];
    }
}
