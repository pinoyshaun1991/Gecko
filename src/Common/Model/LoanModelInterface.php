<?php

namespace lendInvest\Common\Model;

/**
 * Declaring the methods needed to display the interest
 *
 * Interface LoanModelInterface
 * @package Common\Controller
 */
interface LoanModelInterface
{
    /**
     * Sets the loan start date
     *
     * @param $date
     * @return mixed
     */
    public function setStartDate($date);

    /**
     * Gets the loan start date
     *
     * @return mixed
     */
    public function getStartDate();

    /**
     * Sets the loan end date
     *
     * @param $date
     * @return mixed
     */
    public function setEndDate($date);

    /**
     * Gets the loan end date
     *
     * @return mixed
     */
    public function getEndDate();
}