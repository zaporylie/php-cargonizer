<?php

namespace zaporylie\Cargonizer;

/**
 * Class ConsignmentPrinter
 *
 * @package zaporylie\Cargonizer
 */
class ConsignmentPrinter extends Client {

  protected $resourceTemplate = '/consignments/label_direct?consignment_ids[]=@consignment_id&printer_id=@printer_id';
  protected $method = 'POST';

  /**
   * Print a consignment.
   */
  public function printConsigment($consignment_id, $printer_id) {
    $this->resource = strtr($this->resourceTemplate, [
      '@consignment_id' => $consignment_id,
      '@printer_id' => $printer_id,
    ]);
    $response_xml = $this->request();

    return $response_xml;
  }

}
