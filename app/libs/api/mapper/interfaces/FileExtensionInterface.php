<?php

namespace App\libs\api\mapper\interfaces;

use Illuminate\Support\Collection;

/**
 * This interface is the contract to keep new extensions in order and being used as method parameter to stay in strategy design pattern (check Mapper class for method parameter)
 */
interface FileExtensionInterface
{
    /**
     * @param string $apiLink
     * @return void
     * This method would be used for loading data from api link
     */
    public function loadApiResult(string $apiLink): void;
}
