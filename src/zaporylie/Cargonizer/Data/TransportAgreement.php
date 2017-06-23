<?php

namespace zaporylie\Cargonizer\Data;

class TransportAgreement implements SerializableDataInterface {

  /**
   * @var string
   */
  protected $description;

  /**
   * @var int
   */
  protected $id;

  /**
   * @var int
   */
  protected $number;

  /**
   * @var \zaporylie\Cargonizer\Data\Carrier
   */
  protected $carrier;

  /**
   * @var \zaporylie\Cargonizer\Data\Products
   */
  protected $products;

  /**
   * @param string $description
   */
  public function setDescription($description) {
    $this->description = $description;
    return $this;
  }

  /**
   * @param \zaporylie\Cargonizer\Data\Carrier $carrier
   */
  public function setCarrier(Carrier $carrier) {
    $this->carrier = $carrier;
    return $this;
  }

  /**
   * @param int $id
   */
  public function setId($id) {
    $this->id = $id;
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
   * @param \zaporylie\Cargonizer\Data\Products $products
   */
  public function setProducts(Products $products) {
    $this->products = $products;
    return $this;
  }

  /**
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @return \zaporylie\Cargonizer\Data\Carrier
   */
  public function getCarrier() {
    return $this->carrier;
  }

  /**
   * @return string
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * @return int
   */
  public function getNumber() {
    return $this->number;
  }

  /**
   * @return \zaporylie\Cargonizer\Data\Products
   */
  public function getProducts() {
    return $this->products;
  }

  /**
   * {@inheritdoc}
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $transportAgreement = new TransportAgreement();
    $transportAgreement->setDescription((string) $xml->description);
    $transportAgreement->setId((int) $xml->id);
    $transportAgreement->setNumber((int) $xml->number);
    if ($xml->carrier instanceof \SimpleXMLElement) {
      $transportAgreement->setCarrier(Carrier::fromXML($xml->carrier));
    }
    if (isset($xml->products->product)) {
      $transportAgreement->setProducts(Products::fromXML($xml->products->product));
    }
    return $transportAgreement;
  }

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    $agreement = $xml->addChild('transport-agreement');
    $agreement->addChild('description', $this->getDescription());
    $agreement->addChild('id', $this->getId());
    $agreement->addChild('number', $this->getNumber());
    $this->getCarrier()->toXML($agreement);
    $this->getProducts()->toXML($agreement);
//    $agreement->addChild('products', $this->get);
//    $agreement->addChild('', $this->get);

    return $xml;
  }
}
