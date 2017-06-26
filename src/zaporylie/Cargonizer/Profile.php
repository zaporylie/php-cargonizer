<?php

namespace zaporylie\Cargonizer;

use zaporylie\Cargonizer\Data\User;

class Profile extends Client {

  protected $resource = '/profile.xml';
  protected $method = 'GET';

  /**
   * @return \zaporylie\Cargonizer\Data\User
   */
  public function getProfile() {
    $xml = $this->request();
    return User::fromXML($xml);
  }
}
