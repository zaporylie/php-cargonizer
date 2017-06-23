<?php

namespace zaporylie\Cargonizer\Data;

class Consignee implements SerializableDataInterface {

  /**
   * Optional.
   *
   * @var bool
   */
  protected $freightPayer;

  /**
   * Optional.
   *
   * @var int
   */
  protected $number;

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
   * Optional.
   *
   * @var string
   */
  protected $email;

  /**
   * Optional.
   *
   * @var string
   */
  protected $mobile;

  /**
   * Optional.
   *
   * @var string
   */
  protected $phone;

  /**
   * Optional.
   *
   * @var string
   */
  protected $fax;

  /**
   * Optional.
   *
   * @var string
   */
  protected $contactPerson;

  /**
   * Optional.
   *
   * @var int
   */
  protected $customerNumber;

  /**
   * @param int $number
   */
  public function setNumber($number) {
    $this->number = $number;
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
   * @param string $contactPerson
   */
  public function setContactPerson($contactPerson) {
    $this->contactPerson = $contactPerson;
    return $this;
  }

  /**
   * @param int $customerNumber
   */
  public function setCustomerNumber($customerNumber) {
    $this->customerNumber = $customerNumber;
    return $this;
  }

  /**
   * @param string $email
   */
  public function setEmail($email) {
    $this->email = $email;
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
   * @param string $phone
   */
  public function setPhone($phone) {
    $this->phone = $phone;
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
   * @param bool $freightPayer
   */
  public function setFreightPayer($freightPayer) {
    $this->freightPayer = $freightPayer;
    return $this;
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
  public function getNumber() {
    return $this->number;
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
   * @return string
   */
  public function getContactPerson() {
    return $this->contactPerson;
  }

  /**
   * @return int
   */
  public function getCustomerNumber() {
    return $this->customerNumber;
  }

  /**
   * @return string
   */
  public function getEmail() {
    return $this->email;
  }

  /**
   * @return string
   */
  public function getMobile() {
    return $this->mobile;
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
  public function getFax() {
    return $this->fax;
  }

  /**
   * {@inheritdoc}
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $consignee = new Consignee();
    $consignee->setName((string) $xml->name);
    $consignee->setPostcode((string) $xml->postcode);
    $consignee->setCity((string) $xml->city);
    $consignee->setCountry((string) $xml->country);
    $consignee->setAddress1((string) $xml->address1);
    $consignee->setAddress2((string) $xml->address2);
    $consignee->setEmail((string) $xml->email);
    $consignee->setMobile((string) $xml->mobile);
    $consignee->setPhone((string) $xml->phone);
    $consignee->setFax((string) $xml->fax);
    return $consignee;
  }

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    $consignee = $xml->addChild('consignee');
    if ($this->getName()) {
      $consignee->addChild('name', $this->getName());
    }
    if ($this->getCountry()) {
      $consignee->addChild('country', $this->getCountry());
    }
    if ($this->getPostcode()) {
      $consignee->addChild('postcode', $this->getPostcode());
    }
    if ($this->getCity()) {
      $consignee->addChild('city', $this->getCity());
    }
    if ($this->getAddress1()) {
      $consignee->addChild('address1', $this->getAddress1());
    }
    if ($this->getAddress2()) {
      $consignee->addChild('address2', $this->getAddress2());
    }
    if ($this->getEmail()) {
      $consignee->addChild('email', $this->getEmail());
    }
    if ($this->getMobile()) {
      $consignee->addChild('mobile', $this->getMobile());
    }
    if ($this->getPhone()) {
      $consignee->addChild('phone', $this->getPhone());
    }
    if ($this->getFax()) {
      $consignee->addChild('fax', $this->getFax());
    }
    return $xml;
  }
}
