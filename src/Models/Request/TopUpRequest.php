<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/7/18
 * Time: 2:45 PM
 */

namespace Alive2212\LaravelEchargeService\Models\Request;

use Alive2212\LaravelEchargeService\EchargeObject;

class TopUpRequest extends EchargeBaseRequest
{
    protected $referenceId;
    protected $mobileNumber;
    protected $amount;
    protected $productId;
    protected $optionMerchantData;

    function __construct(
        EchargeObject $echargeObject,
        int $referenceId,
        string $mobileNumber,
        int $amount,
        int $productId,
        string $optionalMerchantData = ''
    )
    {
        $this->setReferenceId($referenceId);
        $this->setMobileNumber($mobileNumber);
        $this->setAmount($amount);
        $this->setProductId($productId);
        $this->setOptionMerchantData($optionalMerchantData);
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
     * get mobile number
     *
     * @return string
     */
    public function getMobileNumber(): string
    {
        return $this->mobileNumber;
    }

    /**
     * set mobile number
     *
     * @param string $mobileNumber
     */
    public function setMobileNumber(string $mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
    }

    /**
     * get amount
     *
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * set amount
     *
     * @param int $amount
     */
    public function setAmount(int $amount)
    {
        $this->amount = $amount;
    }

    /**
     * get product id
     *
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * set product id
     *
     * @param int $productId
     */
    public function setProductId(int $productId)
    {
        $this->productId = $productId;
    }

    /**
     * get option merchant data
     *
     * @return string
     */
    public function getOptionMerchantData(): string
    {
        return $this->optionMerchantData;
    }

    /**
     * set option merchant data
     *
     * @param string $optionMerchantData
     */
    public function setOptionMerchantData(string $optionMerchantData)
    {
        $this->optionMerchantData = $optionMerchantData;
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
            'MobileNumber' => $this->getMobileNumber(),
            'Amount' => $this->getAmount(),
            'ProductId' => $this->getProductId(),
            'OptionalMerchantData' => $this->getOptionMerchantData(),
        ];
    }
}