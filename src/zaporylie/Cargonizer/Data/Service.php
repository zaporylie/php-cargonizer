<?php

namespace zaporylie\Cargonizer\Data;

class Service {

  /**
   * @var string
   */
  protected $identifier;

  /**
   * @var string
   */
  protected $name;

  /**
   * @var \zaporylie\Cargonizer\Data\Attribute[]
   */
  protected $attributes;

  /**
   * @param string $identifier
   */
  public function setIdentifier($identifier) {
    $this->identifier = $identifier;
  }

  /**
   * @param string $name
   */
  public function setName($name) {
    $this->name = $name;
  }

  /**
   * @param \zaporylie\Cargonizer\Data\Attribute[] $attributes
   */
  public function setAttributes($attributes) {
    $this->attributes = $attributes;
  }

  /**
   * @param \SimpleXMLElement $xml
   *
   * @return \zaporylie\Cargonizer\Data\Service
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $service = new Service();
    $service->setIdentifier((string) $xml->identifier);
    $service->setName((string) $xml->name);
    $attributes = [];
    if (isset($xml->attributes->attribute)) {
      foreach ($xml->attributes->attribute as $attribute) {
        $attributes[] = Attribute::fromXML($attribute);
      }
    }
    $service->setAttributes($attributes);
    return $service;
  }
}
