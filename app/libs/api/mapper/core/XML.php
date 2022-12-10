<?php

namespace App\libs\api\mapper\core;

use App\libs\api\mapper\interfaces\FileExtensionInterface;

class XML extends Core implements FileExtensionInterface
{
    /**
     * @param string $modelPath
     * Since modelPath is used for loading configuration from yaml file;
     * construct method is responsible for loading said configuration with the path
     */
    public function __construct(private string $modelPath)
    {
        $this->objConfig = new Config();
        $this->configurationArray = $this->objConfig->loadModelConfiguration($this->modelPath)['attributes']['xml'];
    }

    /**
     * @param string $apiLink
     * @return void
     * This method simply loads XML data using simplexml_load_file
     * fillDataArray method loads up apiDataArray property
     */
    public function loadApiResult(string $apiLink): void
    {
        $this->unprocessedData = (array)simplexml_load_file($apiLink);
        $this->fillDataArray();
    }
}
