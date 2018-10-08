<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/6/18
 * Time: 1:44 PM
 */

namespace Alive2212\LaravelEchargeService;

use Alive2212\LaravelEchargeService\Models\Request\VoucherRequest;
use Alive2212\LaravelEchargeService\Models\Response\VoucherResponse;

class   RegisterVoucher extends BaseEcharge
{
    protected $voucherRequest;

    /**
     * @param int|null $referenceId
     * @param int|null $count
     * @param int|null $productId
     * @param string|null $optionalMerchantData
     * @return VoucherRequest
     */
    public function getVoucherRequest(
        int $referenceId = null,
        int $count = null,
        int $productId = null,
        string $optionalMerchantData = ''
    ): VoucherRequest
    {
        if (
            is_null($this->voucherRequest)
            && !is_null($referenceId)
            && !is_null($count)
            && !is_null($productId)
        ) {
            return new VoucherRequest(
                $this->getEchargeObject(),
                $referenceId,
                $count,
                $productId,
                $optionalMerchantData
            );
        }
        return $this->voucherRequest;
    }

    /**
     * @param VoucherRequest $voucherRequest
     */
    public function setVoucherRequest(VoucherRequest $voucherRequest)
    {
        $this->voucherRequest = $voucherRequest;
    }

    public function registerVoucher(
        int $referenceId,
        int $count,
        int $productId,
        string $optionalMerchantData = ''
    )
    {
        return new VoucherResponse(
            $this
                ->getEchargeObject()
                ->getClient()
                ->RegisterVoucher(
                    $this->getVoucherRequest(
                        $referenceId,
                        $count,
                        $productId,
                        $optionalMerchantData
                    )->getRequest()
                )
        );
    }
}