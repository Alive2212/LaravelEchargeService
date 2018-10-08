<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/6/18
 * Time: 10:57 AM
 */

namespace Alive2212\LaravelEchargeService;


use Alive2212\LaravelEchargeService\Models\Request\StatusRequest;
use Alive2212\LaravelEchargeService\Models\Response\StatusResponse;

class Status extends BaseEcharge
{
    /**
     * @var
     */
    protected $statusRequest;

    /**
     * @param int|null $referenceId
     * @return StatusRequest
     */
    public function getStatusRequest(int $referenceId = null): StatusRequest
    {
        if (
            is_null($this->statusRequest)
            && !is_null($referenceId)
        ) {
            return new StatusRequest(
                    $this->getEchargeObject(),
                    $referenceId
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

    public function getStatus(int $referenceId)
    {
        return new StatusResponse(
            $this
                ->getEchargeObject()
                ->getClient()
                ->GetStatus(
                    $this->getStatusRequest($referenceId)->getRequest()
                )
        );
    }
}