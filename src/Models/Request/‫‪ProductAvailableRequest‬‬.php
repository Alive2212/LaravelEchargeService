<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/4/18
 * Time: 4:31 PM
 */

namespace Alive2212\LaravelEchargeService\Models\Request;

use Alive2212\LaravelEchargeService\EchargeObject;

class ‫‪ProductAvailableRequest‬‬ extends EchargeBaseRequest
{
    /**
     * product id in integer format
     *
     * @var
     */
    protected $productId;

    /**
     * ‫‪ProductAvailableRequest‬‬ constructor.
     * @param EchargeObject $echargeObject
     * @param int $productId
     */
    function __construct(EchargeObject $echargeObject,int $productId)
    {
        $this->setProductId($productId);
        parent::__construct($echargeObject);
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param mixed $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return [
            'ProductId' => $this->getProductId(),
        ];
    }
}