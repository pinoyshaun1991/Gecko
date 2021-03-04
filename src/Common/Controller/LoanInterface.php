<?php

namespace lendInvest\Common\Controller;

/**
 * Declaring the methods needed for the loan
 *
 * Interface LoanInterface
 * @package Common\Controller
 */
interface LoanInterface
{
    /**
     * Declare getInterest method
     *
     * @param $interestRate
     * @param $amountInvested
     * @param $amount
     * @param $date
     * @return mixed
     */
    public function getInterest($interestRate, $amountInvested, $amount, $date);
}