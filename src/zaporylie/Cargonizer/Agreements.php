<?php

namespace zaporylie\Cargonizer;

use zaporylie\Cargonizer\Data\TransportAgreement;

class Agreements extends Client {

  protected $resource = '/transport_agreements.xml';
  protected $method = 'GET';

  /**
   * @return \zaporylie\Cargonizer\Data\TransportAgreement[]
   */
  public function getAgreements() {
    $content = $this->request()->getBody()->getContents();
    $agreements = simplexml_load_string($content);
    $output = [];

    /** @var \SimpleXMLElement $agreement */
    foreach ($agreements as $agreement) {
      $output[] = TransportAgreement::unserialize($agreement);
    }

    return $output;
  }
}
