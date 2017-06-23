<?php

namespace zaporylie\Cargonizer\Data;

class Attribute implements SerializableDataInterface {

  /**
   * @var string
   */
  protected $identifier;

  /**
   * @var string
   */
  protected $name;

  /**
   * @var string
   */
  protected $type;

  /**
   * @var bool
   */
  protected $required;

  /**
   * @var int
   */
  protected $min;

  /**
   * @var int
   */
  protected $max;

  /**
   * @var null|array
   */
  protected $values;

  /**
   * @param string $identifier
   */
  public function setIdentifier($identifier) {
    $this->identifier = $identifier;
    return $this;
  }

  /**
   * @param string $name
   */
  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  /**
   * @param int $min
   */
  public function setMin($min) {
    $this->min = $min;
    return $this;
  }

  /**
   * @param int $max
   */
  public function setMax($max) {
    $this->max = $max;
    return $this;
  }

  /**
   * @param bool $required
   */
  public function setRequired($required) {
    $this->required = $required;
    return $this;
  }

  /**
   * @param string $type
   */
  public function setType($type) {
    $this->type = $type;
    return $this;
  }

  /**
   * @param array $values
   */
  public function setValues($values) {
    $this->values = $values;
    return $this;
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
  public function getMax() {
    return $this->max;
  }

  /**
   * @return int
   */
  public function getMin() {
    return $this->min;
  }

  /**
   * @return string
   */
  public function getType() {
    return $this->type;
  }

  /**
   * @return array|null
   */
  public function getValues() {
    return $this->values;
  }

  /**
   * @param \SimpleXMLElement $xml
   *
   * @return \zaporylie\Cargonizer\Data\Attribute
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $attribute = new Attribute();
    $attribute->setIdentifier((string) $xml->identifier);
    $attribute->setName((string) $xml->name);
    $attribute->setType((string) $xml->type);
    $attribute->setRequired((string) $xml->required == 'true' ? true : false);
    $attribute->setMin((int) $xml->min);
    $attribute->setMax((int) $xml->max);
    return $attribute;
  }

  public function toXML(\SimpleXMLElement $xml) {
    $attribute = $xml->addChild('attribute');
    $attribute->addChild('identifier', $this->getIdentifier());
    $attribute->addChild('name', $this->getName());
    $attribute->addChild('min', $this->getMin());
    $attribute->addChild('max', $this->getMax());
    return $xml;
  }
}
