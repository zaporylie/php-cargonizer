<?php

namespace zaporylie\Cargonizer\Data;

/**
 * Class ServicePartner
 *
 * @package zaporylie\Cargonizer\Data
 */
class ServicePartner implements SerializableDataInterface {

  /**
   * @var string
   */
  protected $number;

  /**
   * @var string
   */
  protected $name;

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
  protected $postcode;

  /**
   * @var string
   */
  protected $city;

  /**
   * @var string
   */
  protected $country;

  /**
   * @var \zaporylie\Cargonizer\Data\OpeningHours
   */
  protected $openingHours;

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
  public function getAddress2() {
    return $this->address2;
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
  public function getNumber() {
    return $this->number;
  }

  /**
   * Gets openingHours value.
   *
   * @return \zaporylie\Cargonizer\Data\OpeningHours
   */
  public function getOpeningHours(): OpeningHours {
    return $this->openingHours;
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
   * @param string $address2
   */
  public function setAddress2($address2) {
    $this->address2 = $address2;
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
   * @param string $name
   */
  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  /**
   * @param int $number
   */
  public function setNumber($number) {
    $this->number = $number;
    return $this;
  }

  /**
   * @param \zaporylie\Cargonizer\Data\OpeningHours $openingHours
   *   The opening hours.
   */
  public function setOpeningHours(OpeningHours $openingHours) {
    $this->openingHours = $openingHours;
    return $openingHours;
  }

  /**
   * {@inheritdoc}
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $partner = new ServicePartner();
    $partner->setPostcode((string) $xml->postcode);
    $partner->setCountry((string) $xml->country);
    $partner->setName((string) $xml->name);
    $partner->setAddress1((string) $xml->address1);
    $partner->setAddress2((string) $xml->address2);
    $partner->setCity((string) $xml->city);
    $partner->setNumber((string) $xml->number);
    if ($xml->{'opening-hours'} instanceof \SimpleXMLElement) {
      $partner->setOpeningHours(OpeningHours::fromXML($xml));
    }
    return $partner;
  }

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    $partner = $xml->addChild('service-partner');
    $partner->addChild('number', $this->getNumber());
    $partner->addChild('name', $this->getName());
    $partner->addChild('address1', $this->getAddress1());
    $partner->addChild('address2', $this->getAddress2());
    $partner->addChild('postcode', $this->getPostcode());
    $partner->addChild('city', $this->getCity());
    $partner->addChild('country', $this->getCountry());
    return $xml;
  }
}
