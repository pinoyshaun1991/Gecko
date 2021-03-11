<?php

namespace gecko\Model;

use gecko\Common\Model\SolarSystemModelInterface;
use gecko\Service\CalculateService;

/**
 * Class SolarSystemModel
 * @package gecko\Model
 */
class SolarSystemModel implements SolarSystemModelInterface
{
    public $id;

    /**
     * Gets the id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add record
     *
     * @param $solarSystem
     * @return mixed
     */
    public function add($solarSystem)
    {
        return $this->id = $solarSystem;
    }

    /**
     * Finds the request
     *
     * @param $solarSystemId
     * @return SolarSystem
     */
    public function find($solarSystemId) : SolarSystem
    {
        if ($solarSystemId === $this->id) {
            return $this->getId();
        }
    }

    /**
     * Calculate measurement
     *
     * @param $unit
     * @return int
     */
    public function calculate($unit) : int
    {
        $calculateService = new CalculateService();

        return $calculateService->calculate($unit);
    }
}