<?php

namespace lendInvest\Common\Model;

/**
 * A generic class to handle all tranches
 *
 * Class TrancheModelInterface
 * @package lendInvest\Common\Model
 */
interface TrancheModelInterface
{
    /**
     * Set interest rate
     *
     * @param $interestRate
     * @return mixed
     */
    public function setInterestRate($interestRate);

    /**
     * Gets interest rate
     *
     * @return mixed
     */
    public function getInterestRate();

    /**
     * Set amount
     *
     * @param $amount
     * @return mixed
     */
    public function setAmount($amount);

    /**
     * Gets amount
     *
     * @return mixed
     */
    public function getAmount();
}