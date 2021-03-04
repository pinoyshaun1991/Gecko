<?php

namespace lendInvest\Model;

use DateTime;
use Exception;
use lendInvest\Common\Model\LoanModelInterface;
use lendInvest\Service\CalculateInterestService;

/**
 * Class InterestModel
 * @package lendInvest\Model
 */
class InterestModel implements LoanModelInterface
{
    /**
     * @var string
     */
    private $startDate = '2020-10-01';

    /**
     * @var string
     */
    private $endDate = '2020-11-15';

    /**
     * @var string
     */
    private $investmentDate;

    /**
     * @var CalculateInterestService
     */
    private $calculateInterestService;

    /**
     * InterestModel constructor.
     */
    public function __construct()
    {
        $this->investmentDate           = '';
        $this->calculateInterestService = new CalculateInterestService();
    }

    /**
     * Set the start date
     *
     * @param $date
     * @return string
     * @throws Exception
     */
    public function setStartDate($date) : string
    {
        if (empty($date)) {
            throw new Exception('Loan start date is required');
        }

        $dateObject = $this->validateDate($date);

        return $this->startDate = $dateObject->format('Y-m-d');
    }

    /**
     * Retrieve start date
     *
     * @return string
     */
    public function getStartDate() : string
    {
        return $this->startDate;
    }

    /**
     * Set the end date
     *
     * @param $date
     * @return string
     * @throws Exception
     */
    public function setEndDate($date) : string
    {
        if (empty($date)) {
            throw new Exception('Loan end date is required');
        }

        $dateObject = $this->validateDate($date);

        return $this->endDate = $dateObject->format('Y-m-d');
    }

    /**
     * Retrieve end date
     *
     * @return string
     */
    public function getEndDate() : string
    {
        return $this->endDate;
    }

    /**
     * Set the investment date
     *
     * @param $date
     * @return string
     * @throws Exception
     */
    public function setInvestmentDate($date) : string
    {
        if (empty($date)) {
            throw new Exception('Investment date is required');
        }

        $dateObject = $this->validateDate($date);

        if (($dateObject->format('Y-m-d') >= $this->startDate) && ($dateObject->format('Y-m-d') <= $this->endDate)) {
            $date = $dateObject->format('Y-m-d');
        } else {
            throw new Exception('Investment date must be between loan period');
        }

        return $this->investmentDate = $date;
    }

    /**
     * Retrieve investment date
     *
     * @return string
     */
    public function getInvestmentDate() : string
    {
        return $this->investmentDate;
    }

    /**
     * Calculates interest
     *
     * @param $interestRate
     * @param $amountInvested
     * @param $amount
     * @param $date
     * @return float
     * @throws Exception
     */
    public function getInterest($interestRate, $amountInvested, $amount, $date) : float
    {
        $this->setInvestmentDate($date);
        $params = array(
            'startDate'      => $this->startDate,
            'endDate'        => date("Y-m-t", strtotime($this->startDate)),
            'interestRate'   => $interestRate,
            'investedDate'   => $date,
            'investedAmount' => $amountInvested
        );

        $investor = new InvestorModel($amountInvested);
        $tranche  = new TrancheModel($interestRate, $amount);
        $tranche->invest($investor->getAmountInvested());
        $interest = $this->getCalculatedInterest($params);
        $investor->updateWallet($interest);

        return $interest;
    }

    /**
     * Retrieve calculated interest value
     *
     * @param $params
     * @return float
     */
    private function getCalculatedInterest($params) : float
    {
        return $this->calculateInterestService->calculateInterest($params);
    }

    /**
     * Validates date
     *
     * @param $date
     * @return DateTime
     * @throws Exception
     */
    private function validateDate($date) : dateTime
    {
        $explodeDate = explode('-', $date);

        if (checkdate($explodeDate[1], $explodeDate[2], $explodeDate[0]) == false) {
            throw new Exception('Invalid investment date');
        }

        return new DateTime($date);
    }
}