<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/1/18
 * Time: 1:13 PM
 */

namespace Alive2212\LaravelEchargeService\Models\Request;

use Alive2212\LaravelEchargeService\EchargeObject;

class BalanceRequest extends EchargeBaseRequest
{
    function __construct(EchargeObject $echargeObject)
    {
        $this->setEchargeObject($echargeObject);
        parent::__construct($echargeObject);
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return [
            'MerchantId' => $this->getEchargeObject()->getMerchantId(),
        ];
    }
}