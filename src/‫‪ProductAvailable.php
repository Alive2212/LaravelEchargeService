<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/4/18
 * Time: 4:31 PM
 */

namespace Alive2212\LaravelEchargeService;

use Alive2212\LaravelEchargeService\Models\Request\‫‪ProductAvailableRequest‬‬;
use Alive2212\LaravelEchargeService\Models\Response\ProductAvailableResponse;

class ‫‪ProductAvailable extends BaseEcharge
{
    /**
     * product available request object to request to soap server
     *
     * @var
     */
    protected $productAvailableRequest;

    function __construct(EchargeObject $echargeObject)
    {
        parent::__construct($echargeObject);
    }

    /**
     * @param int $productId
     * @return ‫‪ProductAvailableRequest‬‬
     */
    public function getProductAvailableRequest(int $productId = null): ‫‪ProductAvailableRequest‬‬
    {
        if (is_null($this->productAvailableRequest) && !is_null($productId)) {
            $this->setProductAvailableRequest(
                new ‫‪ProductAvailableRequest‬‬(
                    $this->getEchargeObject(),
                    $productId
                )
            );
        }
        return $this->productAvailableRequest;
    }

    /**
     * @param ‫‪ProductAvailableRequest‬‬ $productAvailableRequest
     */
    public function setProductAvailableRequest(‫‪ProductAvailableRequest‬‬ $productAvailableRequest)
    {
        $this->productAvailableRequest = $productAvailableRequest;
    }

    /**
     * @param int $productId
     * @return ProductAvailableResponse
     */
    public function isProductAvailable(int $productId): ProductAvailableResponse
    {
        return new ProductAvailableResponse((object)$this
            ->getEchargeObject()
            ->getClient()
            ->IsProductAvailable(
                $this->getProductAvailableRequest($productId)->getRequest()
            ));
    }
}