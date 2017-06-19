<?php

namespace zaporylie\Cargonizer\Data;

class Estimation {

  /**
   * @var float
   */
  protected $gross;

  /**
   * @var float
   */
  protected $net;

  /**
   * @var float
   */
  protected $estimated;

  /**
   * @param float $estimated
   */
  public function setEstimated($estimated) {
    $this->estimated = $estimated;
  }

  /**
   * @param float $gross
   */
  public function setGross($gross) {
    $this->gross = $gross;
  }

  /**
   * @param float $net
   */
  public function setNet($net) {
    $this->net = $net;
  }

  /**
   * @return float
   */
  public function getEstimated() {
    return $this->estimated;
  }

  /**
   * @return float
   */
  public function getGross() {
    return $this->gross;
  }

  /**
   * @return float
   */
  public function getNet() {
    return $this->net;
  }

  /**
   * @param \SimpleXMLElement $xml
   *
   * @return \zaporylie\Cargonizer\Data\Estimation
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $estimation = new Estimation();
    $estimation->setEstimated((float) $xml->estimated);
    $estimation->setGross((float) $xml->gross);
    $estimation->setNet((float) $xml->net);
    return $estimation;
  }
}
