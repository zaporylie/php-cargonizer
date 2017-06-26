<?php

namespace zaporylie\Cargonizer\Data;

class Managership implements SerializableDataInterface {

  /**
   * @var int
   */
  protected $id;

  /**
   * @var \zaporylie\Cargonizer\Data\Sender
   */
  protected $sender;

  /**
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @return \zaporylie\Cargonizer\Data\Sender
   */
  public function getSender() {
    return $this->sender;
  }

  /**
   * @param int $id
   */
  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  /**
   * @param \zaporylie\Cargonizer\Data\Sender $sender
   */
  public function setSender($sender) {
    $this->sender = $sender;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function fromXML(\SimpleXMLElement $xml) {
    $managership = new Managership();
    $managership->setID((float) $xml->{'id'});
    $managership->setSender(Sender::fromXML($xml->{'sender'}));
    return $managership;
  }

  /**
   * {@inheritdoc}
   */
  public function toXML(\SimpleXMLElement $xml) {
    $managership = $xml->addChild('managership');
    $managership->addChild('id', $this->getID())->addAttribute('type', 'integer');
    $this->getSender()->toXML($managership);
    return $xml;
  }
}
