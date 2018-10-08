<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/4/18
 * Time: 1:35 PM
 */

namespace Alive2212\LaravelEchargeService\Models\Request;

use Alive2212\LaravelEchargeService\EchargeObject;
use Alive2212\LaravelEchargeService\Models\SoapObjectModel;

abstract class EchargeBaseRequest extends SoapObjectModel
{
    /**
     * echarge object to get all data
     *
     * @var
     */
    protected $echargeObject;

    /**
     * BaseRequest constructor.
     * @param EchargeObject $echargeObject
     */
    function __construct(EchargeObject $echargeObject)
    {
        $this->echargeObject = $echargeObject;
    }

    /**
     * add merchant id to params of object that send to soap server
     *
     * @return array
     */
    public function getAllParams():array
    {
        $params = $this->getParams();
        $params = array_add($params,'MerchantId',$this->getEchargeObject()->getMerchantId());
        return $params;
    }

    public function getRequest()
    {
        return [
            "request" => $this->getStd(),
        ];
    }

    /**
     * @return EchargeObject
     */
    public function getEchargeObject():EchargeObject
    {
        return $this->echargeObject;
    }

    /**
     * @param EchargeObject $echargeObject
     * @return $this
     */
    public function setEchargeObject(EchargeObject $echargeObject)
    {
        $this->echargeObject = $echargeObject;
        return $this;
    }
}