<?php

namespace zaporylie\Cargonizer\Data;

class User implements SerializableDataInterface {

  /**
   * @var string
   */
  protected $email;

  /**
   * @var string
   */
  protected $firstName;

  /**
   * @var string
   */
  protected $lastName;

  /**
   * @var string
   */
  protected $username;

  /**
   * @var \zaporylie\Cargonizer\Data\Managerships
   */
  protected $managerships;

  /**
   * @return string
   */
  public function getEmail() {
    return $this->email;
  }

  /**
   * @return string
   */
  public function getFirstName() {
    return $this->firstName;
  }

  /**
   * @return string
   */
  public function getLastName() {
    return $this->lastName;
  }

  /**
   * @return \zaporylie\Cargonizer\Data\Managerships
   */
  public function getManagerships() {
    return $this->managerships;
  }

  /**
   * @return string
   */
  public function getUsername() {
    return $this->username;
  }

  /**
   * @param string $email
   */
  public function setEmail($email) {
    $this->email = $email;
  }

  /**
   * @param string $firstName
   */
  public function setFirstName($firstName) {
    $this->firstName = $firstName;
  }

  /**
   * @param string $lastName
   */
  public function setLastName($lastName) {
    $this->lastName = $lastName;
  }

  /**
   * @param \zaporylie\Cargonizer\Data\Managerships $managerships
   */
  public function setManagerships(Managerships $managerships) {
    $this->managerships = $managerships;
  }

  /**
   * @param string $username
   */
  public function setUsername($username) {
    $this->username = $username;
  }

  /**
   * {@inheritdoc}
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $user = new User();
    $user->setEmail((string) $xml->{'email'});
    $user->setFirstName((string) $xml->{'first-name'});
    $user->setLastName((string) $xml->{'last-name'});
    $user->setUsername((string) $xml->{'username'});
    $user->setManagerships(Managerships::fromXML($xml->{'managerships'}));
    return $user;
  }

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    if ($xml === null) {
      $user = $xml = new \SimpleXMLElement("<?xml version=\"1.0\" encoding=\"UTF-8\"?><user></user>");
    }
    else {
      $user = $xml->addChild('user');
    }
    $user->addChild('first-name', $this->getFirstName());
    $user->addChild('last-name', $this->getLastName());
    $user->addChild('username', $this->getUsername());
    $user->addChild('email', $this->getEmail());
    return $xml;
  }
}
