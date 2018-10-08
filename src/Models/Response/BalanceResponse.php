<?php

/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/4/18
 * Time: 6:08 PM
 */
namespace Alive2212\LaravelEchargeService\Models\Response;

class BalanceResponse extends EchargeBaseResponse
{
    protected $balance;

    protected $resultCode;

    protected $statusCode;

    /**
     * @return int
     */
    public function getBalance(): int
    {
        if (is_null($this->balance)){
            return $this->params['Balance'];
        }
        return $this->balance;
    }

    /**
     * @param int $balance
     * @return $this
     */
    public function setBalance(int $balance)
    {
        $this->balance = $balance;
        return $this;
    }

}