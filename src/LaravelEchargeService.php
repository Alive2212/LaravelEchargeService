<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/4/18
 * Time: 11:51 AM
 */

namespace Alive2212\LaravelEchargeService;

use Alive2212\LaravelEchargeService\Models\Response\InternetPackagesResponse;
use Alive2212\LaravelEchargeService\Models\Response\ProductAvailableResponse;
use Alive2212\LaravelEchargeService\Models\Response\StatusResponse;

class LaravelEchargeService extends BasePackage
{
    /**
     * echarge object
     *
     * @var
     */
    protected $echargeObject;

    /**
     * get echarge object
     *
     * @return EchargeObject
     */
    public function getEchargeObject(): EchargeObject
    {
        if (is_null($this->echargeObject)) {
            $echargeObject = new EchargeObject();
            return $echargeObject;
        }
        return $this->echargeObject;
    }

    /**
     * Set echarge object
     *
     * @param EchargeObject $echargeObject
     * @return $this
     */
    public function setEchargeObject(EchargeObject $echargeObject)
    {
        $this->echargeObject = $echargeObject;
        return $this;
    }

    /**
     * Get balance
     *
     * @return Models\Response\BalanceResponse
     */
    public function getBalance()
    {
        $balance = new Balance($this->getEchargeObject());
        return $balance->getBalance();
    }


    /**
     * Is product available
     *
     * @param int $productId
     * @return ProductAvailableResponse
     */
    public function isProductAvailable(int $productId): ProductAvailableResponse
    {
        $productAvailable = new ‫‪ProductAvailable($this->getEchargeObject());
        return $productAvailable->isProductAvailable(
            $productId
        );
    }

    /**
     * get reveal voucher
     *
     * @param int $referenceId
     * @return StatusResponse
     */
    public function getRevealVouchers(int $referenceId): StatusResponse
    {
        $revealVoucher = new RevealVoucher($this->getEchargeObject());
        return $revealVoucher->getRevealVouchers(
            $referenceId
        );
    }

    /**
     * get status
     *
     * @param int $referenceId
     * @return StatusResponse
     */
    public function getStatus(
        int $referenceId
    )
    {
        $status = new Status($this->getEchargeObject());
        return $status->getStatus(
            $referenceId
        );
    }

    /**
     * register voucher
     *
     * @param int $referenceId
     * @param int $count
     * @param int $productId
     * @param string $optionalMerchantData
     * @return Models\Response\VoucherResponse
     */
    public function registerVoucher(
        int $referenceId,
        int $count,
        int $productId,
        string $optionalMerchantData = ''
    )
    {
        $voucher = new RegisterVoucher($this->getEchargeObject());
        return $voucher->registerVoucher(
            $referenceId,
            $count,
            $productId,
            $optionalMerchantData
        );
    }

    /**
     * get all internet packages
     *
     * @return InternetPackagesResponse
     */
    public function getInternetPackage(): InternetPackagesResponse
    {
        $internetPackage = new InternetPackage($this->getEchargeObject());
        return $internetPackage->getInternetPackages();
    }

    /**
     * register TopUp
     *
     * @param int|null $referenceId
     * @param string|null $mobileNumber
     * @param int|null $amount
     * @param int|null $productId
     * @param string $optionalMerchantData
     * @return Models\Response\TopUpResponse
     */
    public function registerTopUp(
        int $referenceId = null,
        string $mobileNumber = null,
        int $amount = null,
        int $productId = null,
        string $optionalMerchantData = ''
    )
    {
        $registerTopUp = new RegisterTopUp($this->getEchargeObject());
        return $registerTopUp->registerTopUp(
            $referenceId,
            $mobileNumber,
            $amount,
            $productId,
            $optionalMerchantData
        );
    }


    /**
     * get all functions
     *
     * @return array
     */
    public function getFunctions(): array
    {
        return ($this->getEchargeObject()->getClient()->__getFunctions());
    }

}