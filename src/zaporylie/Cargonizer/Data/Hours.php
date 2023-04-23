<?php

namespace zaporylie\Cargonizer\Data;

class Hours implements SerializableDataInterface {

  /**
   * @var string
   */
  protected $from;

  /**
   * @var string
   */
  protected $to;

  /**
   * Gets from value.
   *
   * @return string
   */
  public function getFrom(): string {
    return $this->from;
  }

  /**
   * Gets to value.
   *
   * @return string
   */
  public function getTo(): string {
    return $this->to;
  }

  /**
   * {@inheritdoc}
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $item = new Hours();
    $item->from = (string) $xml->attributes()->from;
    $item->to = (string) $xml->attributes()->to;
    return $item;
  }


  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    $item = $xml->addChild('item');
    $item->addAttribute('from', $this->from);
    $item->addAttribute('to', $this->to);

    return $xml;
  }
}
