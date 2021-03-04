<?php

namespace lendInvest\Model;

use Exception;

/**
 * Class InvestorModel
 * @package lendInvest\Model
 */
class InvestorModel
{
    /**
     * @var int
     */
    private $wallet;

    /**
     * @var int
     */
    private $amountInvested;

    /**
     * InvestorModel constructor.
     * @param $amountInvested
     * @throws Exception
     */
    public function __construct($amountInvested)
    {
        $this->wallet         = 1000;
        $this->amountInvested = 0;
        $this->setWalletAmount($amountInvested);
        $this->setAmountInvested($amountInvested);
    }

    /**
     * Set the wallet amount after investment
     *
     * @param $amountInvested
     * @return int
     * @throws Exception
     */
    public function setWalletAmount($amountInvested) : int
    {
        if (is_int($amountInvested) === false) {
            throw new Exception('Amount invested needs to be a numeric value');
        }

        $remainingAmount = $this->wallet - $amountInvested;

        if ($remainingAmount < 0) {
            throw new Exception('There is not enough money to invest this amount and tranche is smaller than the amount requested');
        }

        return $this->wallet = $remainingAmount;
    }

    /**
     * Retrieve wallet amount
     *
     * @return int
     */
    public function getWallet() : int
    {
        return $this->wallet;
    }

    /**
     * Sets the amount invested
     *
     * @param $amountInvested
     * @return int
     * @throws Exception
     */
    public function setAmountInvested($amountInvested) : int
    {
        if (is_int($amountInvested) === false) {
            throw new Exception('Amount invested needs to be a numeric value');
        }

        return $this->amountInvested = $amountInvested;
    }

    /**
     * Get amount invested value
     *
     * @return int
     */
    public function getAmountInvested() : int
    {
        return $this->amountInvested;
    }

    /**
     * Updates wallet after calculating interest
     *
     * @param $interest
     * @return float
     * @throws Exception
     */
    public function updateWallet($interest) : float
    {
        if (is_float($interest) == false) {
            throw new Exception('Interest needs to be a float value');
        }

        return $this->wallet += $interest;
    }
}