<?php

namespace zaporylie\Cargonizer\Data;

class Product {

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
   * @var \zaporylie\Cargonizer\Data\Service[]
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
   * @param \zaporylie\Cargonizer\Data\Service[] $services
   */
  public function setServices($services) {
    $this->services = $services;
  }

  /**
   * @param \SimpleXMLElement $xml
   *
   * @return \zaporylie\Cargonizer\Data\Product
   */
  public static function unserialize(\SimpleXMLElement $xml) {
    $product = new Product();
    $product->setIdentifier((string) $xml->identifier);
    $product->setName((string) $xml->name);
    $product->setMinItems((int) $xml->min_items);
    $product->setMaxItems((int) $xml->max_items);
    $product->setMinWeight((int) $xml->min_weight);
    $product->setMaxWeight((int) $xml->max_weight);

    $services = [];
    if (isset($xml->services->service)) {
      foreach ($xml->services->service as $service) {
        $services[] = Service::unserialize($service);
      }
    }
    $product->setServices($services);
    return $product;
  }
}
