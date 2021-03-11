<?php

namespace gecko\Model;

use gecko\Common\Model\PlanetModelInterface;
use gecko\Service\CalculateService;

/**
 * Class PlanetModel
 * @package gecko\Model
 */
class PlanetModel implements PlanetModelInterface
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
     * @param $planet
     * @return mixed
     */
    public function add($planet)
    {
        return $this->id = $planet;
    }

    /**
     * Finds the request
     *
     * @param $planetId
     * @return Planet
     */
    public function find($planetId) : Planet
    {
        if ($planetId === $this->id) {
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