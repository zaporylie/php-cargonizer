<?php

namespace zaporylie\Cargonizer\Data;

class Attribute {

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
  }

  /**
   * @param string $name
   */
  public function setName($name) {
    $this->name = $name;
  }

  /**
   * @param int $min
   */
  public function setMin($min) {
    $this->min = $min;
  }

  /**
   * @param int $max
   */
  public function setMax($max) {
    $this->max = $max;
  }

  /**
   * @param bool $required
   */
  public function setRequired($required) {
    $this->required = $required;
  }

  /**
   * @param string $type
   */
  public function setType($type) {
    $this->type = $type;
  }

  /**
   * @param array $values
   */
  public function setValues($values) {
    $this->values = $values;
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
}
