<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/6/18
 * Time: 1:45 PM
 */

namespace Alive2212\LaravelEchargeService\Models\Request;


use Alive2212\LaravelEchargeService\EchargeObject;

class VoucherRequest extends EchargeBaseRequest
{
    /**
     * reference id
     *
     * @var
     */
    protected $referenceId;

    /**
     * count
     *
     * @var
     */
    protected $count;

    /**
     * product id
     *
     * @var
     */
    protected $productId;

    /**
     * optional merchant data
     *
     * @var
     */
    protected $optionalMerchantData;

    function __construct(
        EchargeObject $echargeObject,
        int $referenceId,
        int $count,
        int $productId,
        string $optionalMerchantData = ''
    )
    {
        $this->setReferenceId($referenceId);
        $this->setCount($count);
        $this->setProductId($productId);
        $this->setOptionalMerchantData($optionalMerchantData);
        $this->setOptionalMerchantData($optionalMerchantData);
        parent::__construct($echargeObject);
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
     * @return $this
     */
    public function setReferenceId(int $referenceId)
    {
        $this->referenceId = $referenceId;
        return $this;
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
     * @return $this
     */
    public function setCount(int $count)
    {
        $this->count = $count;
        return $this;
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
     * @return $this
     */
    public function setProductId(int $productId)
    {
        $this->productId = $productId;
        return $this;
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
     * @return $this
     */
    public function setOptionalMerchantData(string $optionalMerchantData)
    {
        $this->optionalMerchantData = $optionalMerchantData;
        return $this;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return [
            'ReferenceId' => $this->getReferenceId(),
            'Count' => $this->getCount(),
            'ProductId' => $this->getProductId(),
            'OptionalMerchantId' => $this->getOptionalMerchantData(),
        ];
    }
}