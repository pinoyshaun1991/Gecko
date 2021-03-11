<?php

namespace gecko\Model;

use gecko\Common\Model\StarModelInterface;
use gecko\Service\CalculateService;

/**
 * Class StarModel
 * @package gecko\Model
 */
class StarModel implements StarModelInterface
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
     * @param $star
     * @return mixed
     */
    public function add($star)
    {
        return $this->id = $star;
    }

    /**
     * Finds the request
     *
     * @param $starId
     * @return Star
     */
    public function find($starId) : Star
    {
        if ($starId === $this->id) {
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