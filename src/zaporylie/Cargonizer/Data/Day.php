<?php

namespace zaporylie\Cargonizer\Data;

class Day implements SerializableDataInterface {

  /**
   * @var string
   */
  protected $name;

  /**
   * @var int
   */
  protected $number;

  /**
   * @var \zaporylie\Cargonizer\Data\Hours[]
   */
  protected $hours;

  /**
   * Gets name value.
   *
   * @return string
   */
  public function getName(): string {
    return $this->name;
  }

  /**
   * Gets number value.
   *
   * @return int
   */
  public function getNumber(): int {
    return $this->number;
  }

  /**
   * {@inheritdoc}
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $item = new Day();
    $item->name = (string) $xml->attributes()->name;
    $item->number = (int) $xml->attributes()->number;
    $hours = [];
    if (isset($xml->hours)) {
      foreach ($xml->hours as $hour) {
        $hours[] = Hours::fromXML($hour);
      }
    }
    $item->hours = $hours;
    return $item;
  }


  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    $item = $xml->addChild('item');
    $item->addAttribute('name', $this->name);
    $item->addAttribute('number', $this->number);
    return $xml;
  }
}
