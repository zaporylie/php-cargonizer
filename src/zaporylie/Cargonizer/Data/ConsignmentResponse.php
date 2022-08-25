<?php

namespace zaporylie\Cargonizer\Data;

class ConsignmentResponse implements SerializableDataInterface {

  /**
   * @var int
   */
  protected $id;

  /**
   * @var string
   */
  protected $number;
  protected $numberWithChecksum;
  protected $consignmentPdf;
  protected $waybillPdf;
  protected $trackingUrl;

  /**
   * @var \zaporylie\Cargonizer\Data\TransportAgreement
   */
  protected $transportAgreement;

  /**
   * @var bool
   */
  protected $bookingRequest;
  protected $transfer;

  /**
   * @var array
   */
  protected $values = [];

  /**
   * @var \zaporylie\Cargonizer\Data\Product
   */
  protected $product;

  /**
   * @param int $id
   */
  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  /**
   * Gets id value.
   *
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Sets number variable.
   *
   * @param string $number
   *
   * @return $this
   */
  public function setNumber($number) {
    $this->number = $number;
    return $this;
  }

  /**
   * Gets number value.
   *
   * @return string
   */
  public function getNumber() {
    return $this->number;
  }

  /**
   * Sets transfer variable.
   *
   * @param mixed $transfer
   *
   * @return $this
   */
  public function setTransfer($transfer) {
    $this->transfer = $transfer;
    return $this;
  }

  /**
   * Gets transfer value.
   *
   * @return mixed
   */
  public function getTransfer() {
    return $this->transfer;
  }

  /**
   * Sets numberWithChecksum variable.
   *
   * @param string $numberWithChecksum
   *
   * @return $this
   */
  public function setNumberWithChecksum($numberWithChecksum) {
    $this->numberWithChecksum = $numberWithChecksum;
    return $this;
  }

  /**
   * Gets numberWithChecksum value.
   *
   * @return string
   */
  public function getNumberWithChecksum() {
    return $this->numberWithChecksum;
  }

  /**
   * Sets consignmentPdf variable.
   *
   * @param mixed $consignmentPdf
   *
   * @return $this
   */
  public function setConsignmentPdf($consignmentPdf) {
    $this->consignmentPdf = $consignmentPdf;
    return $this;
  }

  /**
   * Gets consignmentPdf value.
   *
   * @return mixed
   */
  public function getConsignmentPdf() {
    return $this->consignmentPdf;
  }

  /**
   * Sets waybillPdf variable.
   *
   * @param mixed $waybillPdf
   *
   * @return $this
   */
  public function setWaybillPdf($waybillPdf) {
    $this->waybillPdf = $waybillPdf;
    return $this;
  }

  /**
   * Gets waybillPdf value.
   *
   * @return mixed
   */
  public function getWaybillPdf() {
    return $this->waybillPdf;
  }

  /**
   * Sets trackingUrl variable.
   *
   * @param mixed $trackingUrl
   *
   * @return $this
   */
  public function setTrackingUrl($trackingUrl) {
    $this->trackingUrl = $trackingUrl;
    return $this;
  }

  /**
   * Gets trackingUrl value.
   *
   * @return mixed
   */
  public function getTrackingUrl() {
    return $this->trackingUrl;
  }

  /**
   * @param \zaporylie\Cargonizer\Data\TransportAgreement $transportAgreement
   */
  public function setTransportAgreement(TransportAgreement $transportAgreement) {
    $this->transportAgreement = $transportAgreement;
    return $this;
  }

  /**
   * @param \zaporylie\Cargonizer\Data\Product $product
   */
  public function setProduct(Product $product) {
    $this->product = $product;
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
   * @return \zaporylie\Cargonizer\Data\Product
   */
  public function getProduct() {
    return $this->product;
  }

  /**
   * Sets bookingRequest variable.
   *
   * @param bool $bookingRequest
   *
   * @return $this
   */
  public function setBookingRequest($bookingRequest) {
    $this->bookingRequest = $bookingRequest;
    return $this;
  }

  /**
   * @param \SimpleXMLElement $xml
   *
   * @return \zaporylie\Cargonizer\Data\ConsignmentResponse
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $consignment = new ConsignmentResponse();
    $consignment->setId((int) $xml->{'id'});
    $consignment->setNumber((string) $xml->{'number'});
    $consignment->setTransfer((string) $xml->{'transfer'} === 'true');
    $consignment->setNumberWithChecksum((string) $xml->{'number-with-checksum'});
    $consignment->setConsignmentPdf((string) $xml->{'consignment-pdf'});
    $consignment->setWaybillPdf((string) $xml->{'waybill-pdf'});
    $consignment->setTrackingUrl((string) $xml->{'tracking-url'});
    $consignment->setBookingRequest((string) $xml->{'booking-request'} === 'true');
    if ($xml->product instanceof \SimpleXMLElement) {
      $consignment->setProduct(Product::fromXML($xml->product));
    }
    if ($xml->{'transport-agreement'} instanceof \SimpleXMLElement) {
      $consignment->setTransportAgreement(TransportAgreement::fromXML($xml->{'transport-agreement'}));
    }
    return $consignment;
  }

  /**
   * @return string
   */
  public function toXML(\SimpleXMLElement $xml) {
  }
}
