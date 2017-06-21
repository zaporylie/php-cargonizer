<?php

namespace zaporylie\Cargonizer\Data;

class Parts implements SerializableDataInterface {

  /**
   * @var \zaporylie\Cargonizer\Data\Consignee
   */
  protected $consignee;

  /**
   * @param \zaporylie\Cargonizer\Data\Consignee $consignee
   */
  public function setConsignee(\zaporylie\Cargonizer\Data\Consignee $consignee) {
    $this->consignee = $consignee;
  }

  /**
   * @return \zaporylie\Cargonizer\Data\Consignee
   */
  public function getConsignee() {
    return $this->consignee;
  }

  /**
   * @param \SimpleXMLElement $xml
   *
   * @return \zaporylie\Cargonizer\Data\Parts
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $parts = new Parts();
    $parts->setConsignee(Consignee::fromXML($xml->consignee));
    return $parts;
  }

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    $parts = $xml->addChild('parts');
    $this->getConsignee()->toXML($parts);
    return $xml;
  }
}
