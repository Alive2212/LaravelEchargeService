<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/7/18
 * Time: 3:01 PM
 */

namespace Alive2212\LaravelEchargeService\Models\Response;


class TopUpResponse extends EchargeBaseResponse
{
    protected $transactionId;
    protected $operatorTransactionId;

    /**
     * get transaction id
     *
     * @return int
     */
    public function getTransactionId(): int
    {
        if (is_null($this->transactionId)) {
            return (int)$this->getParams()['TransactionId'];
        }
        return $this->transactionId;
    }

    /**
     * set Transaction id
     *
     * @param int $transactionId
     * @return $this
     */
    public function setTransactionId(int $transactionId)
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    /**
     * get operator transaction id
     *
     * @return string
     */
    public function getOperatorTransactionId(): string
    {
        if (is_null($this->operatorTransactionId)) {
            return (string)$this->getParams()['OperatorTransactionId'];
        }
        return $this->operatorTransactionId;
    }

    /**
     * set operator transaction id
     *
     * @param string $operatorTransactionId
     * @return $this
     */
    public function setOperatorTransactionId(string $operatorTransactionId)
    {
        $this->operatorTransactionId = $operatorTransactionId;
        return $this;
    }
}