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

  /**
   * @var bool
   */
  protected $print = false;

  /**
   * @var array
   */
  protected $values = [];

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

  /**
   * @var array
   */
  protected $services = [];

  /**
   * @var \zaporylie\Cargonizer\Data\References
   */
  protected $references;
  protected $message;


  /**
   * @return mixed
   */
  public function getTransfer() {
    return $this->transfer;
  }

  /**
   * @param mixed $transfer
   */
  public function setTransfer($transfer) {
    $this->transfer = $transfer;
  }

  /**
   * @return mixed
   */
  public function getPrint() {
    return $this->print;
  }

  /**
   * @param mixed $print
   */
  public function setPrint($print) {
    $this->print = $print;
  }

  /**
   * @return bool
   */
  public function getEstimate() {
    return $this->estimate;
  }

  /**
   * @param bool $estimate
   */
  public function setEstimate($estimate) {
    $this->estimate = $estimate;
  }

  public function setReferences(References $references) {
    $this->references = $references;
  }

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

  public function addValue($key, $value) {
    $this->values[$key] = $value;
  }

  public function setValues(array $values) {
    $this->values = $values;
  }

  /**
   * @return array
   */
  public function getServices() {
    return $this->services;
  }

  public function addService($id) {
    $this->services[] = $id;
  }

  public function setServices(array $values) {
    $this->services = $values;
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

  public function getReferences() {
    return $this->references;
  }

  /**
   * @return string
   */
  public function toXML(\SimpleXMLElement $xml) {
    $consignment = $xml->addChild('consignment');
    $consignment->addAttribute("transport_agreement", $this->getTransportAgreement());
    if ($this->getPrint()) {
      $consignment->addAttribute('print', 'true');
    }
    if ($this->getEstimate()) {
      $consignment->addAttribute('estimate', 'true');
      // I have also seen this variant.
      $consignment->addAttribute('cost_estimate', 'true');
    }
    $values = $consignment->addChild('values');
    foreach ($this->values as $key => $value) {
      $value_el = $values->addChild('value');
      $value_el->addAttribute('name', $key);
      $value_el->addAttribute('value', $value);
    }
    if ($this->getTransfer()) {
      $consignment->addChild('transfer', 'true');
    }
    $consignment->addChild('product', $this->getProduct());
    $this->getReferences()->toXML($consignment);
    $this->getParts()->toXML($consignment);
    $this->getItems()->toXML($consignment);
    $services = $consignment->addChild('services');
    foreach ($this->getServices() as $service) {
      $service_el = $services->addChild('service');
      $service_el->addAttribute('id', $service);
    }
    return $xml;
  }
}
