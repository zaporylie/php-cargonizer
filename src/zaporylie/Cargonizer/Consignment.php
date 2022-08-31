<?php

namespace zaporylie\Cargonizer;

use zaporylie\Cargonizer\Data\Consignments;
use zaporylie\Cargonizer\Data\ConsignmentsResponse;

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
   * @return \zaporylie\Cargonizer\Data\ConsignmentsResponse
   */
  public function createConsignments(Consignments $consignments) {
    $xml = $consignments->toXML();
    $response_xml = $this->request([], $xml->asXML());
    return ConsignmentsResponse::fromXML($response_xml);
  }

  /**
   * @param \zaporylie\Cargonizer\Data\Consignments $consignments
   *
   * @return \zaporylie\Cargonizer\Data\ConsignmentsResponse
   *
   * @deprecated The name was misleading. Use createConsignments instead.
   */
  public function requestConsigment(Consignments $consignments) {
    return $this->createConsignments($consignments);
  }

}
