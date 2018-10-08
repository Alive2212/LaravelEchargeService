<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/6/18
 * Time: 6:13 PM
 */

namespace Alive2212\LaravelEchargeService\Models\Response;


use stdClass;

class InternetPackagesResponse extends EchargeBaseResponse
{
    protected $TAG = 'BoltonV4';

    protected $boltons;

    function __construct(stdClass $object)
    {
        parent::__construct($object);
        $this->setParams((array)array_first($this->getParams()));
    }

    /**
     * @return array
     */
    public function getBoltons(): array
    {
        if (is_null($this->boltons)) {
            $boltons = $this->getParams()[$this->TAG];
            $response = [];
            foreach ($boltons as $bolton) {
                array_push($response, new Bolton($bolton));
            }
            return $response;
        }
        return $this->boltons;
    }

    /**
     * @param array $boltons
     * @return $this
     */
    public function setBoltons(array $boltons)
    {
        $this->boltons = $boltons;
        return $this;
    }
}