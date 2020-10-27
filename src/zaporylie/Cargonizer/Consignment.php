<?php

namespace zaporylie\Cargonizer;

use zaporylie\Cargonizer\Data\Consignments;

/**
 * Class Consigment
 *
 * @package zaporylie\Cargonizer
 */
class Consignment extends Client {

  protected $resource = '/consignments.xml';
  protected $method = 'POST';

  /**
   * @param \zaporylie\Cargonizer\Data\Consignments $consignments
   *
   * @return \zaporylie\Cargonizer\Data\Estimation
   */
  public function requestConsigment(Consignments $consignments) {
    $xml = $consignments->toXML();
    $response_xml = $this->request([], $xml->asXML());

    return $response_xml;
  }

}
