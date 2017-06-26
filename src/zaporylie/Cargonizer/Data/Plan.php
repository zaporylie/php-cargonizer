<?php

namespace zaporylie\Cargonizer\Data;

class Plan implements SerializableDataInterface {

  /**
   * @var string
   */
  protected $name;

  /**
   * @var int
   */
  protected $itemLimit;

  /**
   * @var int
   */
  protected $itemCounter;

  /**
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @return int
   */
  public function getItemCounter() {
    return $this->itemCounter;
  }

  /**
   * @return int
   */
  public function getItemLimit() {
    return $this->itemLimit;
  }

  /**
   * @param string $name
   */
  public function setName($name) {
    $this->name = $name;
  }

  /**
   * @param int $itemCounter
   */
  public function setItemCounter($itemCounter) {
    $this->itemCounter = $itemCounter;
  }

  /**
   * @param int $itemLimit
   */
  public function setItemLimit($itemLimit) {
    $this->itemLimit = $itemLimit;
  }

  /**
   * {@inheritdoc}
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $plan = new Plan();
    $plan->setName((string) $xml->{'name'});
    $plan->setItemLimit((int) $xml->{'item_limit'});
    $plan->setItemCounter((int) $xml->{'item_counter'});
    return $plan;
  }

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    $plan = $xml->addChild('plan');
    $xml->addChild('plan', $this->getName());
    $xml->addChild('item_limit', $this->getItemLimit());
    $xml->addChild('item_counter', $this->getItemCounter());
    return $xml;
  }
}
