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
   * @var \zaporylie\Cargonizer\Data\ReturnAddress
   */
  protected $returnAddress;

  /**
   * @return \zaporylie\Cargonizer\Data\ReturnAddress
   */
  public function getReturnAddress() {
    return $this->returnAddress;
  }

  /**
   * @param \zaporylie\Cargonizer\Data\ReturnAddress $returnAddress
   */
  public function setReturnAddress(\zaporylie\Cargonizer\Data\ReturnAddress $returnAddress) {
    $this->returnAddress = $returnAddress;
    return $this;
  }

  /**
   * @param \zaporylie\Cargonizer\Data\Consignee $consignee
   */
  public function setConsignee(Consignee $consignee) {
    $this->consignee = $consignee;
    return $this;
  }

  /**
   * @param \zaporylie\Cargonizer\Data\ServicePartner $servicePartner
   */
  public function setServicePartner(ServicePartner $servicePartner) {
    $this->servicePartner = $servicePartner;
    return $this;
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
    $parts->setConsignee(Consignee::fromXML($xml->{'consignee'}));
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
    if ($this->getReturnAddress()) {
      $this->getReturnAddress()->toXML($parts);
    }
    return $xml;
  }
}
