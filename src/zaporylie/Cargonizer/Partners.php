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
   * @param string|null $product
   * @param string|null $shop_id
   *
   * @return \zaporylie\Cargonizer\Data\Results
   */
  public function getPickupPoints($country, $postcode, $carrier, $product = NULL, $shop_id = NULL) {
    $options = ['country' => $country, 'postcode' => $postcode, 'carrier' => $carrier];
    if (isset($product)) {
      $options += ['product' => $product];
    }
    if (isset($shop_id)) {
      $options += ['shop_id' => $shop_id];
    }
    $xml = $this->request([], $options);
    return Results::fromXML($xml);
  }
}
