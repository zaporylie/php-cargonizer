<?php

namespace zaporylie\Cargonizer\Data;

class Parts implements SerializableDataInterface {

  /**
   * @var \zaporylie\Cargonizer\Data\Consignee
   */
  protected $consignee;

  /**
   * @var \zaporylie\Cargonizer\Data\ServicePartner
   */
  protected $servicePartner;

  /**
   * @param \zaporylie\Cargonizer\Data\Consignee $consignee
   */
  public function setConsignee(\zaporylie\Cargonizer\Data\Consignee $consignee) {
    $this->consignee = $consignee;
  }

  /**
   * @param \zaporylie\Cargonizer\Data\ServicePartner $servicePartner
   */
  public function setServicePartner($servicePartner) {
    $this->servicePartner = $servicePartner;
  }

  /**
   * @return \zaporylie\Cargonizer\Data\Consignee
   */
  public function getConsignee() {
    return $this->consignee;
  }

  /**
   * @return \zaporylie\Cargonizer\Data\ServicePartner
   */
  public function getServicePartner() {
    return $this->servicePartner;
  }

  /**
   * @param \SimpleXMLElement $xml
   *
   * @return \zaporylie\Cargonizer\Data\Parts
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $parts = new Parts();
    $parts->setConsignee(Consignee::fromXML($xml->consignee));
    $parts->setServicePartner(ServicePartner::fromXML($xml->{'service-partner'}));
    return $parts;
  }

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    $parts = $xml->addChild('parts');
    if ($this->getConsignee()) {
      $this->getConsignee()->toXML($parts);
    }
    if ($this->getServicePartner()) {
      $this->getServicePartner()->toXML($parts);
    }
    return $xml;
  }
}
