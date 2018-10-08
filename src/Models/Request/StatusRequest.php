<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/4/18
 * Time: 7:02 PM
 */

namespace Alive2212\LaravelEchargeService\Models\Request;

use Alive2212\LaravelEchargeService\EchargeObject;

class StatusRequest extends EchargeBaseRequest
{
    /**
     * reference id
     *
     * @var
     */
    protected $referenceId;

    /**
     * StatusRequest constructor.
     * @param EchargeObject $echargeObject
     * @param int $referenceId
     */
    function __construct(
        EchargeObject $echargeObject,
        int $referenceId
    )
    {
        $this->setReferenceId($referenceId);
        parent::__construct($echargeObject);
    }

    /**
     * get reference id
     *
     * @return int
     */
    public function getReferenceId(): int
    {
        return $this->referenceId;
    }

    /**
     * set reference id
     *
     * @param int $referenceId
     */
    public function setReferenceId(int $referenceId)
    {
        $this->referenceId = $referenceId;
    }

    /**
     * get params
     *
     * @return array
     */
    public function getParams(): array
    {
        return [
            'ReferenceId' => $this->getReferenceId(),
        ];
    }
}