<?php

namespace zaporylie\Cargonizer;

/**
 * Class Estimation
 *
 * @package zaporylie\Cargonizer
 */
class Estimation extends Client {

  protected $resource = '/consignment_costs.xml';
  protected $method = 'POST';

  /**
   * @param array $params
   *
   * @return mixed
   */
  public function getEstimation(array $params = []) {
    return $this->request([], $params);
  }
}
