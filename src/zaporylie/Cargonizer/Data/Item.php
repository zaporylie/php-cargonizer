<?php

namespace zaporylie\Cargonizer\Data;

class Item implements SerializableDataInterface {

  /**
   * @var string
   */
  protected $package;

  /**
   * Required. Amount of parcels.
   *
   * @var int
   */
  protected $amount;

  /**
   * Required.
   *
   * @var float
   */
  protected $weight;

  /**
   * Required.
   *
   * @var float
   */
  protected $volume;

  /**
   * Optional.
   *
   * @var float
   */
  protected $length;

  /**
   * Optional.
   *
   * @var float
   */
  protected $height;

  /**
   * Optional.
   *
   * @var float
   */
  protected $width;

  /**
   * Optional.
   *
   * @var float
   */
  protected $loadMeter;

  /**
   * Optional.
   *
   * @var string
   */
  protected $description;

  /**
   * @param string $description
   */
  public function setDescription($description) {
    $this->description = $description;
    return $this;
  }

  /**
   * @param int $amount
   */
  public function setAmount($amount) {
    $this->amount = $amount;
    return $this;
  }

  /**
   * @param float $height
   */
  public function setHeight($height) {
    $this->height = $height;
    return $this;
  }

  /**
   * @param float $length
   */
  public function setLength($length) {
    $this->length = $length;
    return $this;
  }

  /**
   * @param float $loadMeter
   */
  public function setLoadMeter($loadMeter) {
    $this->loadMeter = $loadMeter;
    return $this;
  }

  /**
   * @param string $package
   */
  public function setPackage($package) {
    $this->package = $package;
    return $this;
  }

  /**
   * @param float $volume
   */
  public function setVolume($volume) {
    $this->volume = $volume;
    return $this;
  }

  /**
   * @param float $weight
   */
  public function setWeight($weight) {
    $this->weight = $weight;
    return $this;
  }

  /**
   * @param float $width
   */
  public function setWidth($width) {
    $this->width = $width;
    return $this;
  }

  /**
   * @return string
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * @return int
   */
  public function getAmount() {
    return $this->amount;
  }

  /**
   * @return float
   */
  public function getHeight() {
    return $this->height;
  }

  /**
   * @return float
   */
  public function getLength() {
    return $this->length;
  }

  /**
   * @return float
   */
  public function getLoadMeter() {
    return $this->loadMeter;
  }

  /**
   * @return string
   */
  public function getPackage() {
    return $this->package;
  }

  /**
   * @return float
   */
  public function getVolume() {
    return $this->volume;
  }

  /**
   * @return float
   */
  public function getWeight() {
    return $this->weight;
  }

  /**
   * @return float
   */
  public function getWidth() {
    return $this->width;
  }

  /**
   * {@inheritdoc}
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $item = new Item();
    return $item;
  }


  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    $item = $xml->addChild('item');
    $item->addAttribute('type', $this->getPackage());
    $item->addAttribute('amount', $this->getAmount());
    $item->addAttribute('weight', $this->getWeight());

    return $xml;
  }
}
