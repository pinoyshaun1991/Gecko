<?php

 namespace gecko\Service;

 use gecko\Common\Service\CalculateGeneralService;

 /**
  * Service calculating measurement units
  *
  * Class CalculateService
  * @package gecko\Service
  */
class CalculateService extends CalculateGeneralService
{
    /**
     * Get the calculated value
     *
     * @param $params
     * @return int
     */
    public function calculate($params) : int
    {
        return $this->calculateContents($params);;
    }
}