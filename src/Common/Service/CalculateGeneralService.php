<?php

namespace gecko\Common\Service;

/**
 * A generic class to handle all calculations
 *
 * Class CalculateGeneralService
 * @package gecko\Common\Service
 */
abstract class CalculateGeneralService
{
    /**
     * CalculateGeneralService constructor.
     */
    public function __construct(){}

    /**
     * Calculates contents from the given parameters
     *
     * @param $params
     * @return int
     */
    public function calculateContents($params) : int
    {
        return $params+1;
    }
}