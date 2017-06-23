<?php

namespace zaporylie\Cargonizer\Data;

class Estimation implements SerializableDataInterface {

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
    return $this;
  }

  /**
   * @param float $gross
   */
  public function setGross($gross) {
    $this->gross = $gross;
    return $this;
  }

  /**
   * @param float $net
   */
  public function setNet($net) {
    $this->net = $net;
    return $this;
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
   * {@inheritdoc}
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $estimation = new Estimation();
    $estimation->setEstimated((float) $xml->{'estimated-cost'});
    $estimation->setGross((float) $xml->{'gross-amount'});
    $estimation->setNet((float) $xml->{'net-amount'});
    return $estimation;
  }

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml = null) {
    if ($xml === null) {
      $xml = new \SimpleXMLElement("<?xml version=\"1.0\" encoding=\"UTF-8\"?><hash></hash>");
    }
    $xml->addChild('gross-amount', $this->getGross())->addAttribute("type", "float");
    $xml->addChild('net-amount', $this->getNet())->addAttribute("type", "float");
    $xml->addChild('estimated-amount', $this->getEstimated())->addAttribute("type", "float");
    return $xml;
  }
}
