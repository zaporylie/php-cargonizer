<?php

namespace zaporylie\Cargonizer\Data;

class Reference implements SerializableDataInterface {

  private $consigneeReference;
  private $consignorReference;

  /**
   * @return self
   */
  public function addConsignorReference($reference) {
    $this->consignorReference = $reference;
    return $this;
  }

  /**
   * @return self
   */
  public function addConsigneeReference($reference) {
    $this->consigneeReference = $reference;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $reference = new Reference();
    return $reference;
  }

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    $reference = $xml->addChild('reference');
    $reference->addChild('consignor', $this->consignorReference);
    $reference->addChild('consignee', $this->consigneeReference);
    return $xml;
  }

}
