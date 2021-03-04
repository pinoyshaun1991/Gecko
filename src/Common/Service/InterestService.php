<?php

namespace lendInvest\Common\Service;

/**
 * A generic class to handle all interest calculations
 *
 * Class InterestService
 * @package lendInvest\Common\Service
 */
abstract class InterestService
{
    /**
     * InterestService constructor.
     */
    public function __construct(){}

    /**
     * Calculates contents from the given parameters
     *
     * @param array $params
     * @return float
     */
    public function calculateContents($params = array()) : float
    {
        $dailyInterestRate  = $this->dailyInterestRate($params);
        $investedPeriodRate = $this->investedPeriodInterestRate($dailyInterestRate, $params);

        return ($params['investedAmount']/100) * $investedPeriodRate;
    }

    /**
     * Calculates daily interest rate
     *
     * @param $params
     * @return float
     */
    public function dailyInterestRate($params) : float
    {
        $dailyInterestRate = 0;

        if (!empty($params)) {
            $startDateExplode  = explode('-', $params['startDate']);
            $dailyInterestRate = $params['interestRate']/cal_days_in_month(CAL_GREGORIAN, $startDateExplode[1], $startDateExplode[0]);
        }

        return $dailyInterestRate;
    }

    /**
     * Calculates invested period interest rate
     *
     * @param $dailyInterestRate
     * @param $params
     * @return float
     */
    public function investedPeriodInterestRate($dailyInterestRate, $params) : float
    {
        $daysInvested = $this->calculateNumberOfDaysTillEndOfMonth($params['investedDate']);

        return $dailyInterestRate * ($daysInvested+1);
    }

    /**
     * Calculates number of days until end of specified month
     *
     * @param $investedDate
     * @return int
     */
    private function calculateNumberOfDaysTillEndOfMonth($investedDate) : int
    {
        $timestamp = strtotime($investedDate);

        return (int)date('t', $timestamp) - (int)date('j', $timestamp);
    }
}