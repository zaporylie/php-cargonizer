<?php

namespace zaporylie\Cargonizer;

use zaporylie\Cargonizer\Data\TransportAgreements;

class Agreements extends Client {

  protected $resource = '/transport_agreements.xml';
  protected $method = 'GET';

  /**
   * @return \zaporylie\Cargonizer\Data\TransportAgreements
   */
  public function getAgreements() {
    $xml = $this->request();
    return TransportAgreements::fromXML($xml);
  }
}
