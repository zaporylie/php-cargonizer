<?php

namespace zaporylie\Cargonizer\Data;

abstract class Address implements AddressInterface, SerializableDataInterface {

  /**
   * @var string
   */
  protected $address1;

  /**
   * @var string
   */
  protected $address2;

  /**
   * @var string
   */
  protected $city;

  /**
   * @var string
   */
  protected $country;

  /**
   * @var string
   */
  protected $fax;

  /**
   * @var string
   */
  protected $mobile;

  /**
   * @var string
   */
  protected $name;

  /**
   * @var string
   */
  protected $phone;

  /**
   * @var string
   */
  protected $postcode;

  /**
   * @param string $name
   */
  public function setName($name) {
    $this->name = $name;
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
   * @param string $country
   */
  public function setCountry($country) {
    $this->country = $country;
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
   * @param string $fax
   */
  public function setFax($fax) {
    $this->fax = $fax;
    return $this;
  }

  /**
   * @param string $phone
   */
  public function setPhone($phone) {
    $this->phone = $phone;
    return $this;
  }

  /**
   * @param string $mobile
   */
  public function setMobile($mobile) {
    $this->mobile = $mobile;
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
  public function getPostcode() {
    return $this->postcode;
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
  public function getCity() {
    return $this->city;
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
  public function getFax() {
    return $this->fax;
  }

  /**
   * @return string
   */
  public function getPhone() {
    return $this->phone;
  }

  /**
   * @return string
   */
  public function getMobile() {
    return $this->mobile;
  }

  /**
   * {@inheritdoc}
   */
  public static function fromXML(\SimpleXMLElement $xml, AddressInterface $address = null) {
    $address->setName((string) $xml->name);
    $address->setPostcode((string) $xml->postcode);
    $address->setCity((string) $xml->city);
    $address->setCountry((string) $xml->country);
    $address->setAddress1((string) $xml->address1);
    $address->setAddress2((string) $xml->address2);
    $address->setMobile((string) $xml->mobile);
    $address->setPhone((string) $xml->phone);
    $address->setFax((string) $xml->fax);
    return $address;
  }

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    $xml->addChild('name', $this->getName());
    $xml->addChild('country', $this->getCountry());
    $xml->addChild('postcode', $this->getPostcode());
    $xml->addChild('city', $this->getCity());
    $xml->addChild('address1', $this->getAddress1());
    $xml->addChild('address2', $this->getAddress2());
    $xml->addChild('mobile', $this->getMobile());
    $xml->addChild('phone', $this->getPhone());
    $xml->addChild('fax', $this->getFax());
    return $xml;
  }
}
