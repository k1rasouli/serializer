<?php

namespace App\libs\api\mapper\core;

class Core
{
    protected array $configurationArray; //This property is used to keep loaded configuration from yaml file
    protected Config $objConfig; //This property is an object of Config class to fill configurationArray property with proper data
    protected array $apiDataArray; //Loaded data from api are saved in this array before mapping
    protected array $mappedData; //This property is used to save mapped data of api
    protected array $unprocessedData; //This property is used a temporary bridge between unmapped and mapped data

    /**
     * @return array
     * Final stage of mapping. Filling mappedData property with apiDataArray and configurationArray
     */
    public function mapper(): array
    {
        foreach ($this->apiDataArray as $dataArray) {
            $rowArray = [];
            foreach ($dataArray as $key => $value) {
                $rowArray[$this->configurationArray[$key]['field_name']] = $value;
            }
            $this->mappedData[] = $rowArray;
        }
        return $this->mappedData;
    }

    /**
     * @return void
     * This method is created to prevent code repetition and filling apiDataArray
     */
    protected function fillDataArray(): void
    {
        foreach ($this->unprocessedData as $arrayItems) {
            foreach ($arrayItems as $item) {
                $this->apiDataArray[] = (array)$item;
            }
        }
    }
}
