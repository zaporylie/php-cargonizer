<?php

namespace zaporylie\Cargonizer\Data;

class Service implements SerializableDataInterface {

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
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @return string
   */
  public function getIdentifier() {
    return $this->identifier;
  }

  /**
   * @return \zaporylie\Cargonizer\Data\Attribute[]
   */
  public function getAttributes() {
    return $this->attributes;
  }

  /**
   * {@inheritdoc}
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

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    return $xml;
  }
}
