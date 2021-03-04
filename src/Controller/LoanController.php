<?php

namespace lendInvest\Controller;

use lendInvest\Common\Controller\LoanInterface;
use Exception;
use lendInvest\Model\InterestModel;

/**
 * Implements the loan interface
 *
 * Class LoanController
 * @package lendInvest\Controller
 */
class LoanController implements LoanInterface
{
    private $interestModel;

    /**
     * LoanController constructor.
     */
    public function __construct()
    {
        $this->interestModel = new InterestModel();
    }

    /**
     * Gets interest
     *
     * @param $interestRate
     * @param $amountInvested
     * @param $amount
     * @param $date
     * @return float
     */
    public function getInterest($interestRate, $amountInvested, $amount, $date) : float
    {
        $interest = 0;

        try {
            $interest = $this->interestModel->getInterest($interestRate, $amountInvested, $amount, $date);
        } catch (Exception $e) {
            print $e->getMessage();
        }

        return $interest;
    }
}