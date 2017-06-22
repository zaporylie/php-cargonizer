<?php

namespace zaporylie\Cargonizer\Data;

class ServicePartners extends ObjectsWrapper implements SerializableDataInterface {


  /**
   * @param \zaporylie\Cargonizer\Data\ServicePartner $item
   *
   * @return self
   */
  public function addItem(ServicePartner $item) {
    $this->array[$item->getNumber()] = $item;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $servicePartners = new ServicePartners();

    /** @var \SimpleXMLElement $agreement */
    foreach ($xml as $partner) {
      $servicePartners->addItem(ServicePartner::fromXML($partner->{'service-partner'}));
    }

    return $servicePartners;
  }

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    $partners = $xml->addChild('service-partners');
    $partners->addAttribute('type', 'array');
    /** @var \zaporylie\Cargonizer\Data\ServicePartner $partner */
    foreach ($this as $partner) {
      $partner->toXML($xml);
    }
    return $xml;
  }
}
