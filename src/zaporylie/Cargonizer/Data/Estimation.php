<?php

namespace zaporylie\Cargonizer\Data;

class Estimation {

  protected $gross;
  protected $net;
  protected $estimated;

  public function __construct($gross, $net, $estimated = NULL) {
    $this->estimated = $estimated;
    $this->net = $net;
    $this->gross = $gross;
  }

  /**
   * @return mixed
   */
  public function getEstimated() {
    return $this->estimated;
  }

  /**
   * @return mixed
   */
  public function getGross() {
    return $this->gross;
  }

  /**
   * @return mixed
   */
  public function getNet() {
    return $this->net;
  }
}
