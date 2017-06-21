<?php

namespace zaporylie\Cargonizer\Data;

class Product implements SerializableDataInterface {

  /**
   * @var string
   */
  protected $identifier;

  /**
   * @var string
   */
  protected $name;

  /**
   * @var int
   */
  protected $minItems;

  /**
   * @var int
   */
  protected $maxItems;

  /**
   * @var int
   */
  protected $minWeight;

  /**
   * @var int
   */
  protected $maxWeight;

  /**
   * @var \zaporylie\Cargonizer\Data\Services
   */
  protected $services;

  /**
   * @param string $identifier
   */
  public function setIdentifier($identifier) {
    $this->identifier = $identifier;
  }

  /**
   * @param int $maxItems
   */
  public function setMaxItems($maxItems) {
    $this->maxItems = $maxItems;
  }

  /**
   * @param int $maxWeight
   */
  public function setMaxWeight($maxWeight) {
    $this->maxWeight = $maxWeight;
  }

  /**
   * @param int $minItems
   */
  public function setMinItems($minItems) {
    $this->minItems = $minItems;
  }

  /**
   * @param int $minWeight
   */
  public function setMinWeight($minWeight) {
    $this->minWeight = $minWeight;
  }

  /**
   * @param string $name
   */
  public function setName($name) {
    $this->name = $name;
  }

  /**
   * @param \zaporylie\Cargonizer\Data\Services $services
   */
  public function setServices($services) {
    $this->services = $services;
  }

  /**
   * @return string
   */
  public function getIdentifier() {
    return $this->identifier;
  }

  /**
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @return int
   */
  public function getMaxItems() {
    return $this->maxItems;
  }

  /**
   * @return int
   */
  public function getMaxWeight() {
    return $this->maxWeight;
  }

  /**
   * @return int
   */
  public function getMinItems() {
    return $this->minItems;
  }

  /**
   * @return int
   */
  public function getMinWeight() {
    return $this->minWeight;
  }

  /**
   * @return \zaporylie\Cargonizer\Data\Services
   */
  public function getServices() {
    return $this->services;
  }

  /**
   * Product constructor.
   */
  public function __construct() {
    $this->setServices(new Services());
  }

  /**
   * @param \SimpleXMLElement $xml
   *
   * @return \zaporylie\Cargonizer\Data\Product
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $product = new Product();
    $product->setIdentifier((string) $xml->identifier);
    $product->setName((string) $xml->name);
    $product->setMinItems((int) $xml->min_items);
    $product->setMaxItems((int) $xml->max_items);
    $product->setMinWeight((int) $xml->min_weight);
    $product->setMaxWeight((int) $xml->max_weight);
    if (isset($xml->services->service)) {
      $product->setServices(Services::fromXML($xml->services->service));
    }
    return $product;
  }

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    $product = $xml->addChild('product');
    $product->addChild('identifier', $this->getIdentifier());
    $product->addChild('name', $this->getName());
    $product->addChild('max_items', $this->getMaxItems());
    $product->addChild('min_items', $this->getMinItems());
    $product->addChild('max_weight', $this->getMaxWeight());
    $product->addChild('min_weight', $this->getMinWeight());
    $this->getServices()->toXML($product);
    return $xml;
  }
}
