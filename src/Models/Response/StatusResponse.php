<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/4/18
 * Time: 7:06 PM
 */

namespace Alive2212\LaravelEchargeService\Models\Response;


class StatusResponse extends EchargeBaseResponse
{
    /**
     * bank transaction
     *
     * @var
     */
    protected $transactionId;

    /**
     * transaction status code
     *
     * @var
     */
    protected $transactionStatusCode;

    /**
     * transaction result code
     *
     * @var
     */
    protected $transactionResultCode;

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
     * @param int $transactionId
     * @return $this
     */
    public function setTransactionId(int $transactionId)
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    public function getTransactionStatusCode(): int
    {
        if (is_null($this->transactionStatusCode)) {
            return (int)$this->getParams()['TransactionStatusCode'];
        }
        return $this->transactionStatusCode;
    }

    /**
     * @param int $transactionStatusCode
     * @return $this
     */
    public function setTransactionStatusCode(int $transactionStatusCode)
    {
        $this->transactionStatusCode = $transactionStatusCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getTransactionResultCode(): int
    {
        if (is_null($this->transactionResultCode)) {
            return (int)$this->getParams()['TransactionResultCode'];
        }
        return $this->transactionResultCode;
    }

    /**
     * @param int $transactionResultCode
     * @return $this
     */
    public function setTransactionResultCode(int $transactionResultCode)
    {
        $this->transactionResultCode = $transactionResultCode;
        return $this;
    }
}