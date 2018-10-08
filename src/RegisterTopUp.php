<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/7/18
 * Time: 2:43 PM
 */

namespace Alive2212\LaravelEchargeService;


use Alive2212\LaravelEchargeService\Models\Request\TopUpRequest;
use Alive2212\LaravelEchargeService\Models\Response\TopUpResponse;

class RegisterTopUp extends BaseEcharge
{
    protected $topUpRequest;

    function __construct(EchargeObject $echargeObject)
    {
        parent::__construct($echargeObject);
    }

    /**
     * @param int $referenceId
     * @param string $mobileNumber
     * @param int $amount
     * @param int $productId
     * @param string $optionalMerchantData
     * @return TopUpRequest
     */
    public function getTopUpRequest(
        int $referenceId = null,
        string $mobileNumber = null,
        int $amount = null,
        int $productId = null,
        string $optionalMerchantData = ''
    ): TopUpRequest
    {
        if (
            is_null($this->topUpRequest)
            && !is_null($referenceId)
            && !is_null($mobileNumber)
            && !is_null($amount)
            && !is_null($productId)
        ) {
            return new TopUpRequest(
                $this->getEchargeObject(),
                $referenceId,
                $mobileNumber,
                $amount,
                $productId,
                $optionalMerchantData
            );
        }
        return $this->topUpRequest;
    }

    /**
     * @param TopUpRequest $topUpRequest
     */
    public function setTopUpRequest(TopUpRequest $topUpRequest)
    {
        $this->topUpRequest = $topUpRequest;
    }

    public function registerTopUp(
        int $referenceId = null,
        string $mobileNumber = null,
        int $amount = null,
        int $productId = null,
        string $optionalMerchantData = ''
    )
    {
//        dd($this->getEchargeObject()
//            ->getClient()
//            ->RegisterTopUp(
//                $this->getTopUpRequest(
//                    $referenceId,
//                    $mobileNumber,
//                    $amount,
//                    $productId,
//                    $optionalMerchantData
//                )->getRequest()
//            )
//        );
        //        dd($this->getTopUpRequest(
//                $referenceId,
//                $mobileNumber,
//                $amount,
//                $productId,
//                $optionalMerchantData
//            )->getRequest());
        return new TopUpResponse(
            $this->getEchargeObject()
                ->getClient()
                ->RegisterTopUp(
                    $this->getTopUpRequest(
                        $referenceId,
                        $mobileNumber,
                        $amount,
                        $productId,
                        $optionalMerchantData
                    )->getRequest()
                )
        );
    }
}