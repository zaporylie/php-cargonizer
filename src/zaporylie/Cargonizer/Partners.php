<?php

namespace zaporylie\Cargonizer;

use zaporylie\Cargonizer\Data\Results;

/**
 * Class Partners
 *
 * @package zaporylie\Cargonizer
 */
class Partners extends Client {
  protected $resource = '/service_partners.xml';
  protected $method = 'GET';

  /**
   * @param string $country
   * @param string $postcode
   * @param string $carrier
   *
   * @return \zaporylie\Cargonizer\Data\Results
   */
  public function getPickupPoints($country, $postcode, $carrier) {
    $xml = $this->request([], ['country' => $country, 'postcode' => $postcode, $carrier => $carrier]);
    return Results::fromXML($xml);
  }
}
