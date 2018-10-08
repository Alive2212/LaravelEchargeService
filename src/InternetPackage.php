<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/6/18
 * Time: 5:57 PM
 */

namespace Alive2212\LaravelEchargeService;


use Alive2212\LaravelEchargeService\Models\Request\BaseRequest;
use Alive2212\LaravelEchargeService\Models\Response\InternetPackagesResponse;

class InternetPackage extends BaseEcharge
{
    /**
     * base request
     *
     * @var
     */
    protected $baseRequest;

    /**
     * get base request
     *
     * @return BaseRequest
     */
    public function getBaseRequest(): BaseRequest
    {
        if (is_null($this->baseRequest)) {
            return new BaseRequest(
                $this->getEchargeObject()
            );
        }
        return $this->baseRequest;
    }

    /**
     * set base request
     *
     * @param BaseRequest $baseRequest
     * @return $this
     */
    public function setBaseRequest(BaseRequest $baseRequest)
    {
        $this->baseRequest = $baseRequest;
        return $this;
    }

    public function getInternetPackages()
    {
        return new InternetPackagesResponse(
            $this->getEchargeObject()
            ->getClient()
            ->GetInternetPackages(
                $this->getBaseRequest()->getRequest()
            )
        );
    }
}