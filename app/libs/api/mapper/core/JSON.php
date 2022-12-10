<?php

namespace App\libs\api\mapper\core;

use App\libs\api\mapper\interfaces\FileExtensionInterface;
use GuzzleHttp\Client;

class JSON extends Core implements FileExtensionInterface
{
    /**
     * @param string $modelPath
     * Since modelPath is used for loading configuration from yaml file;
     * construct method is responsible for loading said configuration with the path
     */
    public function __construct(private string $modelPath)
    {
        $this->objConfig = new Config();
        $this->configurationArray = $this->objConfig->loadModelConfiguration($this->modelPath)['attributes']['json'];
    }

    /**
     * @param string $apiLink
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * This method simply loads json data using GuzzleHttp
     * fillDataArray method loads up apiDataArray property
     */
    public function loadApiResult(string $apiLink): void
    {
        $client = new Client();
        $this->unprocessedData = json_decode($client->get($apiLink, ['verify' => !env('APP_DEBUG')])->getBody(), true);
        $this->fillDataArray();
    }
}
