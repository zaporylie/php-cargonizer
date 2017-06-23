<?php

namespace zaporylie\Cargonizer\Data;

/**
 * Class Location
 *
 * @package zaporylie\Cargonizer\Data
 */
class Location implements SerializableDataInterface {

  /**
   * @var int
   */
  protected $id;

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
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param string $city
   */
  public function setCity($city) {
    $this->city = $city;
  }

  /**
   * @param string $country
   */
  public function setCountry($country) {
    $this->country = $country;
  }

  /**
   * @param string $postcode
   */
  public function setPostcode($postcode) {
    $this->postcode = $postcode;
  }

  /**
   * @param int $id
   */
  public function setId($id) {
    $this->id = $id;
  }

  /**
   * {@inheritdoc}
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $location = new Location();
    $location->setCity((string) $xml->city);
    $location->setPostcode((string) $xml->postcode);
    $location->setCountry((string) $xml->country);
    $location->setId((int) $xml->id);
    return $location;
  }

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    $location = $xml->addChild('location');
    $location->addChild('id', $this->getId());
    $location->addChild('postcode', $this->getPostcode());
    $location->addChild('city', $this->getCity());
    $location->addChild('country', $this->getCountry());
    return $xml;
  }
}
