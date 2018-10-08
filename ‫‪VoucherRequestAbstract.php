<?php

namespace Alive2212\LaravelEchargeService;

/**
 * Created by PhpStorm.
 * User: alive
 * Date: 9/30/18
 * Time: 12:09 PM
 */
abstract class ‫‪VoucherRequestAbstract
{
    /**
     * @var
     */
    public $merchantId;

    /**
     * @var
     */
    public $referenceId;

    /**
     * @var
     */
    public $count;

    /**
     * @var
     */
    public $productId;

    /**
     * @var
     */
    public $optionalMerchantData;

    abstract function __construct(
        int $merchantId,
        int $referenceId,
        int $count,
        int $productId,
        string $optionalMerchantData
    );

    /**
     * @return int
     */
    public function getMerchantId(): int
    {
        return $this->merchantId;
    }

    /**
     * @param int $merchantId
     */
    public function setMerchantId(int $merchantId)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return int
     */
    public function getReferenceId(): int
    {
        return $this->referenceId;
    }

    /**
     * @param int $referenceId
     */
    public function setReferenceId(int $referenceId)
    {
        $this->referenceId = $referenceId;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount(int $count)
    {
        $this->count = $count;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     */
    public function setProductId(int $productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return string
     */
    public function getOptionalMerchantData(): string
    {
        return $this->optionalMerchantData;
    }

    /**
     * @param string $optionalMerchantData
     */
    public function setOptionalMerchantData(string $optionalMerchantData)
    {
        $this->optionalMerchantData = $optionalMerchantData;
    }
}