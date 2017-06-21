<?php

namespace zaporylie\Cargonizer;

use zaporylie\Cargonizer\Data\Consignments;

/**
 * Class Estimation
 *
 * @package zaporylie\Cargonizer
 */
class Estimation extends Client {

  protected $resource = '/consignment_costs.xml';
  protected $method = 'POST';

  /**
   * @param \zaporylie\Cargonizer\Data\Consignments $consignments
   *
   * @return \zaporylie\Cargonizer\Data\Estimation
   */
  public function getEstimation(Consignments $consignments) {
    $xml = $consignments->toXML();
//    $xml = $this->request([], $xml->asXML());
    $xml = $this->request();
    return \zaporylie\Cargonizer\Data\Estimation::fromXML($xml);
  }
}
