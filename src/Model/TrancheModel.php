<?php

namespace lendInvest\Model;

use Exception;
use lendInvest\Common\Model\TrancheModelInterface;

/**
 * Class TrancheModel
 * @package lendInvest\Model
 */
class TrancheModel implements TrancheModelInterface
{
    /**
     * Interest rate
     *
     * @var int
     */
    public $interestRate;

    /**
     * Amount available
     *
     * @var int
     */
    public $amount;

    /**
     * TrancheModel constructor.
     * @param $interestRate
     * @param $amount
     * @throws Exception
     */
    public function __construct($interestRate, $amount)
    {
        $this->interestRate = 0;
        $this->amount       = 0;
        $this->setInterestRate($interestRate);
        $this->setAmount($amount);
    }

    /**
     * Set interest rate
     *
     * @param $interestRate
     * @return float
     * @throws Exception
     */
    public function setInterestRate($interestRate) : float
    {
        if (is_float($interestRate) === false) {
            throw new Exception('Interest rate needs to be a numeric value');
        }

        return $this->interestRate = $interestRate;
    }

    /**
     * Gets interest rate
     *
     * @return float
     */
    public function getInterestRate() : float
    {
        return $this->interestRate;
    }

    /**
     * Set amount
     *
     * @param $amount
     * @return int
     * @throws Exception
     */
    public function setAmount($amount) : int
    {
        if (is_int($amount) === false) {
            throw new Exception('Amount needs to be a numeric value');
        }

        return $this->amount = $amount;
    }

    /**
     * Gets amount
     *
     * @return int
     */
    public function getAmount() : int
    {
        return $this->amount;
    }

    /**
     * Invest method
     *
     * @param $amountInvested
     * @return int
     * @throws Exception
     */
    public function invest($amountInvested) : int
    {
        if (is_int($amountInvested) === false) {
            throw new Exception('Amount invested needs to be a numeric value');
        }

        $remainingAmount = $this->amount - $amountInvested;

        if ($remainingAmount < 0) {
            if ($amountInvested > $this->amount && $this->amount != 0) {
                throw new Exception('Tranche is smaller than amount invested');
            } else {
                throw new Exception('Maximum amount reached for investment');
            }
        }

        /** Update amount value **/
        $this->setAmount($remainingAmount);

        return $this->amount;
    }
}