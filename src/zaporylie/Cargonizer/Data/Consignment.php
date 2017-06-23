<?php

namespace zaporylie\Cargonizer\Data;

class Consignment implements SerializableDataInterface {

  /**
   * @var int
   */
  protected $transportAgreement;

  /**
   * @var bool
   */
  protected $estimate;
  protected $transfer;
  protected $bookingRequest;
  protected $print;
  protected $values;

  /**
   * @var string
   */
  protected $product;

  /**
   * @var \zaporylie\Cargonizer\Data\Parts
   */
  protected $parts;

  /**
   * @var \zaporylie\Cargonizer\Data\Items
   */
  protected $items;
  protected $services;
  protected $references;
  protected $message;

  /**
   * @param int $transportAgreement
   */
  public function setTransportAgreement($transportAgreement) {
    $this->transportAgreement = $transportAgreement;
    return $this;
  }

  /**
   * @param \zaporylie\Cargonizer\Data\Items $items
   */
  public function setItems(Items $items) {
    $this->items = $items;
    return $this;
  }

  /**
   * @param \zaporylie\Cargonizer\Data\Item $item
   */
  public function addItem(Item $item) {
    $this->items[] = $item;
    return $this;
  }

  /**
   * @param string $product
   */
  public function setProduct($product) {
    $this->product = $product;
    return $this;
  }

  /**
   * @param \zaporylie\Cargonizer\Data\Parts $parts
   */
  public function setParts(Parts $parts) {
    $this->parts = $parts;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getValues() {
    return $this->values;
  }

  /**
   * @return string
   */
  public function getProduct() {
    return $this->product;
  }

  /**
   * @return \zaporylie\Cargonizer\Data\Parts
   */
  public function getParts() {
    return $this->parts;
  }

  /**
   * @return \zaporylie\Cargonizer\Data\Items
   */
  public function getItems() {
    return $this->items;
  }

  /**
   * @return int
   */
  public function getTransportAgreement() {
    return $this->transportAgreement;
  }

  /**
   * @param \SimpleXMLElement $xml
   *
   * @return \zaporylie\Cargonizer\Data\Consignment
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $consignment = new Consignment();
    return $consignment;
  }

  /**
   * @return string
   */
  public function toXML(\SimpleXMLElement $xml) {
    $consignment = $xml->addChild('consignment');
    $consignment->addAttribute("transport_agreement", $this->getTransportAgreement());
    $consignment->addChild('product', $this->getProduct());
    $this->getParts()->toXML($consignment);
    $this->getItems()->toXML($consignment);
    return $xml;
  }
}
