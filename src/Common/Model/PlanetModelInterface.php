<?php

namespace gecko\Common\Model;

/**
 * Declaring the methods needed for the planet
 *
 * Interface PlanetModelInterface
 * @package gecko\Common\Model
 */
interface PlanetModelInterface
{
    /**
     * Declare add method
     *
     * @param $planet
     * @return mixed
     */
    public function add($planet);

    /**
     * Declare find method
     *
     * @param $planetId
     * @return mixed
     */
    public function find($planetId);

    /**
     * Calculate
     *
     * @param $unit
     * @return mixed
     */
    public function calculate($unit);
}