<?php

/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/4/18
 * Time: 6:08 PM
 */

namespace Alive2212\LaravelEchargeService\Models\Response;

use stdClass;

class EchargeBaseResponse
{
    /**
     * params as array
     *
     * @var array
     */
    protected $params;

    /**
     * result code to determine what happened
     *
     * @var
     */
    protected $resultCode;

    /**
     * response of request
     *
     * @var
     */

    protected $statusCode;


    function __construct(stdClass $object)
    {
        $this->setParams((array)array_first(get_object_vars($object)));
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params)
    {
        $this->params = $params;
    }

    /**
     * @return int
     */
    public function getResultCode(): int
    {
        if (is_null($this->resultCode)){
            return $this->params['ResultCode'];
        }
        return $this->resultCode;
    }

    /**
     * @param int $resultCode
     * @return $this
     */
    public function setResultCode(int $resultCode)
    {
        $this->resultCode = $resultCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        if (is_null($this->statusCode)){
            return $this->params['StatusCode'];
        }
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * to array params
     *
     * @return array
     */
    public function toArray():array
    {
        return (array)$this->getParams();
    }
}