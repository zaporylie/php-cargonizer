<?php

namespace zaporylie\Cargonizer;

use zaporylie\Cargonizer\Data\User;

class Profile extends Client {

  protected $resource = '/profile.xml';
  protected $method = 'GET';

  /**
   * @return \zaporylie\Cargonizer\Data\TransportAgreements
   */
  public function getProfile() {
    $xml = $this->request();
    var_dump($xml);
    return User::fromXML($xml);
  }
}
