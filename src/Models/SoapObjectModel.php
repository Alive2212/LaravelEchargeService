<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/4/18
 * Time: 10:06 AM
 */

namespace Alive2212\LaravelEchargeService\Models;

use stdClass;

abstract class SoapObjectModel
{
    /**
     * name space
     *
     * @var null
     */
    protected $nameSpace= null;

    /**
     * @return string
     */
    public function getNameSpace(): string
    {
        return $this->nameSpace;
    }

    /**
     * @param string $nameSpace
     */
    public function setNameSpace(string $nameSpace)
    {
        $this->nameSpace = $nameSpace;
    }

    /**
     * @return stdClass
     */
    public function getStd(): stdClass
    {
        $params = $this->getAllParams();
        return (object)$params;
    }

    /**
     * this method for child to add something into array by default
     *
     * @return array
     */
    public function getAllParams(): array
    {
        return $this->getParams();
    }

    /**
     * @return array
     */
    abstract public function getParams(): array;
}