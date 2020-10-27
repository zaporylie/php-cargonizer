<?php

namespace zaporylie\Cargonizer\Data;

class References extends ObjectsWrapper implements SerializableDataInterface {

  /**
   * @param \zaporylie\Cargonizer\Data\Item $item
   *
   * @return self
   */
  public function addReference(Reference $reference) {
    $this->array[] = $reference;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $refs = new References();

    foreach ($xml as $item) {
      $refs->addReference(Reference::fromXML($item));
    }

    return $refs;
  }

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    $references = $xml->addChild('references');
    foreach ($this as $reference) {
      $reference->toXML($references);
    }
    return $xml;
  }

}
