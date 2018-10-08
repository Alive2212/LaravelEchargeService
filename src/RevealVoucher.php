<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/4/18
 * Time: 7:16 PM
 */

namespace Alive2212\LaravelEchargeService;


use Alive2212\LaravelEchargeService\Models\Request\StatusRequest;
use Alive2212\LaravelEchargeService\Models\Response\StatusResponse;

class RevealVoucher extends BaseEcharge
{
    /**
     * @var
     */
    protected $statusRequest;

    /**
     * RevealVoucher constructor.
     * @param EchargeObject $echargeObject
     */
    function __construct(EchargeObject $echargeObject)
    {
        parent::__construct($echargeObject);
    }

    public function getStatusRequest(int $referenceId = null): StatusRequest
    {
        if (is_null($this->statusRequest) && !is_null($referenceId)) {
            $this->setStatusRequest(
                new StatusRequest(
                    $this->echargeObject,
                    $referenceId
                )
            );
        }
        return $this->statusRequest;
    }

    /**
     * @param StatusRequest $statusRequest
     */
    public function setStatusRequest(StatusRequest $statusRequest)
    {
        $this->statusRequest = $statusRequest;
    }

    /**
     * @param int $referenceId
     * @return StatusResponse
     */
    public function getRevealVouchers(int $referenceId)
    {
        return new StatusResponse(
            $this
                ->getEchargeObject()
                ->getClient()
                ->RevealVouchers(
                    $this->getStatusRequest($referenceId)->getRequest()
                )
        );
    }
}