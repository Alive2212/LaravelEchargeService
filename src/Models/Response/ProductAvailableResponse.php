<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/4/18
 * Time: 6:40 PM
 */

namespace Alive2212\LaravelEchargeService\Models\Response;


class ProductAvailableResponse extends EchargeBaseResponse
{
    protected $isAvailable=true;

    /**
     * @return bool
     */
    public function isAvailable(): bool
    {
        if (is_null($this->isAvailable)){
            return $this->params['IsAvailable'];
        }
        return $this->isAvailable;
    }

    /**
     * @param bool $isAvailable
     */
    public function setIsAvailable(bool $isAvailable)
    {
        $this->isAvailable = $isAvailable;
    }
}