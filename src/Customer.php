<?php

namespace CodingKatas\SuperMarket;

use CodingKatas\SuperMarket\Payment\PayableInterface;

class Customer
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Wallet
     */
    protected $wallet;

    /**
     * @param int    $id
     * @param string $name
     */
    public function __construct($id, $name, Wallet $wallet)
    {
        $this->id = $id;
        $this->name = $name;
        $this->wallet = $wallet;
    }

    /**
     * @return int
     */
    public function identity()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return Wallet
     */
    public function wallet()
    {
        return $this->wallet;
    }

    /**
     * @param  PayableInterface $payment
     * @return bool
     */
    public function isAbleToPay(PayableInterface $payment)
    {
        return $this->wallet->enoughMoneyToPay($payment);
    }
}