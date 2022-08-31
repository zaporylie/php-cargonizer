<?php

namespace zaporylie\Cargonizer\Data;

class References extends ObjectsWrapper implements SerializableDataInterface {

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
    $refs = new References();

    return $refs;
  }

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    $references = $xml->addChild('references');
    $references->addChild('consignor', $this->consignorReference);
    $references->addChild('consignee', $this->consigneeReference);
    return $xml;
  }

}
