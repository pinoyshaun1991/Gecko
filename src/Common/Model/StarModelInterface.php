<?php

namespace gecko\Common\Model;

/**
 * Declaring the methods needed for the star
 *
 * Interface StarModelInterface
 * @package gecko\Common\Controller
 */
interface StarModelInterface
{
    /**
     * Declare add method
     *
     * @param $star
     * @return mixed
     */
    public function add($star);

    /**
     * Declare find method
     *
     * @param $starId
     * @return mixed
     */
    public function find($starId);

    /**
     * Calculate
     *
     * @param $unit
     * @return mixed
     */
    public function calculate($unit);
}