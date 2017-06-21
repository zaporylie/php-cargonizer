<?php

namespace zaporylie\Cargonizer\Data;

class Items extends ObjectsWrapper implements SerializableDataInterface {

  /**
   * @param \zaporylie\Cargonizer\Data\Item $item
   *
   * @return self
   */
  public function addItem(Item $item) {
    $this->array[] = $item;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $items = new Items();

    foreach ($xml as $item) {
      $items->addItem(Item::fromXML($item));
    }

    return $items;
  }

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    $items = $xml->addChild('items');
    foreach ($this as $item) {
      $item->toXML($items);
    }
    return $xml;
  }
}
