<?php

namespace App\libs\api\mapper;

use App\libs\api\mapper\interfaces\FileExtensionInterface;

class Mapper
{
    /**
     * @param string $apiLink
     * @param FileExtensionInterface $mappingObject
     *
     * 2 private properties are filled in here.The first one is the apiLink.
     * Ths second one is an object from ExtensionInterface. This property make it available to create object from any extension class (JSON, XML and...) as we please.
     */
    public function __construct(private string $apiLink, private FileExtensionInterface $mappingObject)
    {
    }

    /**
     * @return array
     * This method is used to load api data in apiDataArray and map it based on yaml configuration and then load the result in mappedData
     */
    public function mapping(): array
    {
        $this->mappingObject->loadApiResult($this->apiLink);
        return $this->mappingObject->mapper();
    }
}
