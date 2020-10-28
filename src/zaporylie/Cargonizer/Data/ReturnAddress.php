<?php

namespace zaporylie\Cargonizer\Data;

class ReturnAddress implements SerializableDataInterface {

  /**
   * Required.
   *
   * @var string
   */
  protected $name;

  /**
   * Optional.
   *
   * @var string
   */
  protected $address1;

  /**
   * Optional.
   *
   * @var string
   */
  protected $address2;

  /**
   * Required.
   *
   * @var string
   */
  protected $postcode;

  /**
   * Optional.
   *
   * @var string
   */
  protected $city;

  /**
   * Required. Only ISO 3166-1 (2-alpha) is supported.
   *
   * @var string
   */
  protected $country;

  /**
   * @param string $name
   */
  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  /**
   * @param string $address1
   */
  public function setAddress1($address1) {
    $this->address1 = $address1;
    return $this;
  }

  /**
   * @param string $address2
   */
  public function setAddress2($address2) {
    $this->address2 = $address2;
    return $this;
  }

  /**
   * @param string $city
   */
  public function setCity($city) {
    $this->city = $city;
    return $this;
  }

  /**
   * @param string $country
   */
  public function setCountry($country) {
    $this->country = $country;
    return $this;
  }

  /**
   * @param string $postcode
   */
  public function setPostcode($postcode) {
    $this->postcode = $postcode;
    return $this;
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
  public function getAddress1() {
    return $this->address1;
  }

  /**
   * @return string
   */
  public function getAddress2() {
    return $this->address2;
  }

  /**
   * @return string
   */
  public function getCity() {
    return $this->city;
  }

  /**
   * @return string
   */
  public function getCountry() {
    return $this->country;
  }

  /**
   * @return string
   */
  public function getPostcode() {
    return $this->postcode;
  }

  /**
   * {@inheritdoc}
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $consignee = new ReturnAddress();
    $consignee->setName((string) $xml->name);
    $consignee->setPostcode((string) $xml->postcode);
    $consignee->setCity((string) $xml->city);
    $consignee->setCountry((string) $xml->country);
    $consignee->setAddress1((string) $xml->address1);
    $consignee->setAddress2((string) $xml->address2);
    return $consignee;
  }

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    $return_address = $xml->addChild('return_address');
    $return_address->addChild('name', $this->getName());
    $return_address->addChild('country', $this->getCountry());
    $return_address->addChild('postcode', $this->getPostcode());
    $return_address->addChild('city', $this->getCity());
    $return_address->addChild('address1', $this->getAddress1());
    $return_address->addChild('address2', $this->getAddress2());
    return $xml;
  }
}
