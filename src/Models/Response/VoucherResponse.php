<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/6/18
 * Time: 5:14 PM
 */

namespace Alive2212\LaravelEchargeService\Models\Response;


class VoucherResponse extends EchargeBaseResponse
{
    /**
     * transaction id
     *
     * @var
     */
    protected $transactionId;

    /**
     * voucher list
     *
     * @var
     */
    protected $vouchers;

    /**
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

    /**
     * @return array
     */
    public function getVouchers(): array
    {
        if (is_null($this->vouchers)) {
            return (array)$this->getParams()['Vouchers'];
        }
        return $this->vouchers;
    }

    /**
     * @param array $vouchers
     * @return $this
     */
    public function setVouchers(array $vouchers)
    {
        $this->vouchers = $vouchers;
        return $this;
    }
}