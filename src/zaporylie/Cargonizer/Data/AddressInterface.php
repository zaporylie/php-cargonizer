<?php

namespace zaporylie\Cargonizer\Data;

interface AddressInterface {

  /**
   * @param string $name
   */
  public function setName($name);

  /**
   * @param string $postcode
   */
  public function setPostcode($postcode);

  /**
   * @param string $country
   */
  public function setCountry($country);

  /**
   * @param string $city
   */
  public function setCity($city);

  /**
   * @param string $address1
   */
  public function setAddress1($address1);

  /**
   * @param string $address2
   */
  public function setAddress2($address2);

  /**
   * @param string $fax
   */
  public function setFax($fax);

  /**
   * @param string $phone
   */
  public function setPhone($phone);

  /**
   * @param string $mobile
   */
  public function setMobile($mobile);

  /**
   * @return string
   */
  public function getName();

  /**
   * @return string
   */
  public function getPostcode();

  /**
   * @return string
   */
  public function getCountry();

  /**
   * @return string
   */
  public function getCity();

  /**
   * @return string
   */
  public function getAddress1();

  /**
   * @return string
   */
  public function getAddress2();

  /**
   * @return string
   */
  public function getFax();

  /**
   * @return string
   */
  public function getPhone();

  /**
   * @return string
   */
  public function getMobile();
}
