<?php

namespace zaporylie\Cargonizer\Data;

use zaporylie\Cargonizer\Data\SerializableDataInterface;

/**
 * Class Consignments.
 *
 * @package zaporylie\Cargonizer\Data
 */
class ConsignmentsResponse extends ObjectsWrapper implements SerializableDataInterface {

  /**
   * @param \zaporylie\Cargonizer\Data\ConsignmentResponse $item
   *
   * @return self
   */
  public function addItem(ConsignmentResponse $item) {
    $this->array[] = $item;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $consignments = new ConsignmentsResponse();
    /** @var \SimpleXMLElement $consignment */
    foreach ($xml as $consignment) {
      $consignments->addItem(ConsignmentResponse::fromXML($consignment));
    }
    return $consignments;
  }

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml = null) {
    if ($xml === NULL) {
      $xml = new \SimpleXMLElement("<?xml version=\"1.0\" encoding=\"UTF-8\"?><consignments></consignments>");
    }
    foreach ($this as $consignment) {
      $consignment->toXML($xml);
    }
    return $xml;
  }
}
