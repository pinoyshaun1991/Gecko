<?php

namespace gecko\Common\Model;

/**
 * Declaring the methods needed for the solar system
 *
 * Interface SolarSystemModelInterface
 * @package Common\Controller
 */
interface SolarSystemModelInterface
{
    /**
     * Declare add method
     *
     * @param $solarSystem
     * @return mixed
     */
    public function add($solarSystem);

    /**
     * Declare find method
     *
     * @param $solarSystemId
     * @return mixed
     */
    public function find($solarSystemId);

    /**
     * Calculate
     *
     * @param $unit
     * @return mixed
     */
    public function calculate($unit);
}