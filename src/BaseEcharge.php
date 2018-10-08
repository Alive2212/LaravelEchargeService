<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/4/18
 * Time: 5:09 PM
 */

namespace Alive2212\LaravelEchargeService;


class BaseEcharge
{
    /**
     * echarge object
     *
     * @var EchargeObject
     */
    protected $echargeObject;

    /**
     * get echarge from when declaring object
     *
     * Balance constructor.
     * @param EchargeObject $echargeObject
     */
    function __construct(EchargeObject $echargeObject)
    {
        $this->setEchargeObject($echargeObject);
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