<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/4/18
 * Time: 11:40 AM
 */

namespace Alive2212\LaravelEchargeService;

use Alive2212\LaravelEchargeService\Models\Request\BalanceRequest;
use Alive2212\LaravelEchargeService\Models\Response\BalanceResponse;
use stdClass;

class Balance extends BaseEcharge
{
    /**
     * balance request
     *
     * @var
     */
    protected $balanceRequest;

    /**
     * @return BalanceRequest
     */
    public function getBalanceRequest(): BalanceRequest
    {
        if (is_null($this->balanceRequest)) {
            return new BalanceRequest($this->getEchargeObject());
        }
        return $this->balanceRequest;
    }

    /**
     * @param BalanceRequest $balanceRequest
     */
    public function setBalanceRequest(BalanceRequest $balanceRequest)
    {
        $this->balanceRequest = $balanceRequest;
    }

    /**
     * @return BalanceResponse
     */
    public function getBalance(): BalanceResponse
    {
        return new BalanceResponse((object)$this
            ->getEchargeObject()
            ->getClient()
            ->GetBalance(
                $this->getBalanceRequest()->getRequest()
            ));
    }
}