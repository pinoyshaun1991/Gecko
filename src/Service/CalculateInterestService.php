<?php

 namespace lendInvest\Service;

 use lendInvest\Common\Service\APIService;
 use lendInvest\Common\Service\InterestService;

 /**
  * Service calculating and returning interest values
  *
  * Class CalculateInterestService
  * @package lendInvest\Service
  */
class CalculateInterestService extends InterestService
{
    /**
     * Get the interest rate value
     *
     * @param $params
     * @return float
     */
    public function calculateInterest($params) : float
    {
        $interest         = 0;
        $rawInterestValue = $this->calculateContents($params);

        if ($rawInterestValue > 0) {
            $interestValue = $rawInterestValue * 100;
            $interest = number_format($interestValue, 2, '.', '');
        }

        return $interest;
    }
}