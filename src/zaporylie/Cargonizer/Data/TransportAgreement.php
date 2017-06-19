<?php

namespace zaporylie\Cargonizer\Data;

class TransportAgreement {

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
   * @var \zaporylie\Cargonizer\Data\Product[]
   */
  protected $products;

  /**
   * @param string $description
   */
  public function setDescription($description) {
    $this->description = $description;
  }

  /**
   * @param \zaporylie\Cargonizer\Data\Carrier $carrier
   */
  public function setCarrier($carrier) {
    $this->carrier = $carrier;
  }

  /**
   * @param int $id
   */
  public function setId($id) {
    $this->id = $id;
  }

  /**
   * @param int $number
   */
  public function setNumber($number) {
    $this->number = $number;
  }

  /**
   * @param \zaporylie\Cargonizer\Data\Product[] $products
   */
  public function setProducts($products) {
    $this->products = $products;
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
   * @return \zaporylie\Cargonizer\Data\Product[]
   */
  public function getProducts() {
    return $this->products;
  }

  /**
   * TransportAgreement constructor.
   *
   * @param \SimpleXMLElement $xml
   *
   * @return \zaporylie\Cargonizer\Data\TransportAgreement
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $transportAgreement = new TransportAgreement();
    $transportAgreement->setDescription((string) $xml->description);
    $transportAgreement->setId((int) $xml->id);
    $transportAgreement->setNumber((int) $xml->number);
    if ($xml->carrier instanceof \SimpleXMLElement) {
      $transportAgreement->setCarrier(Carrier::fromXML($xml->carrier));
    }
    $products = [];
    if (isset($xml->products->product)) {
      foreach ($xml->products->product as $product) {
        $products[] = Product::fromXML($product);
      }
    }

    $transportAgreement->setProducts($products);
    return $transportAgreement;
  }
}
