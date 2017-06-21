<?php

include __DIR__ . '/../vendor/autoload.php';

$yaml = new \Symfony\Component\Yaml\Parser();
$settings = \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__.'/config.yml'));


try {
  \zaporylie\Cargonizer\Config::set('endpoint', $settings['endpoint']);
  \zaporylie\Cargonizer\Config::set('secret', $settings['secret']);
  \zaporylie\Cargonizer\Config::set('sender', $settings['sender']);

  /** @var \zaporylie\Cargonizer\Data\TransportAgreements $agreements */
  $agreements = (new \zaporylie\Cargonizer\Agreements())->getAgreements();
  var_dump($agreements);
  foreach ($agreements as $agreement) {
    echo '<strong>' . $agreement->getCarrier()->getName() . ' (' . $agreement->getId() . '):</strong><br>';

    /** @var \zaporylie\Cargonizer\Data\Product $product */
    foreach ($agreement->getProducts() as $product) {
      echo $product->getIdentifier() . ' - ' . $product->getName() . '<br>';
    }
  }
  $xml = $agreements->toXML();
  $dom = dom_import_simplexml($xml)->ownerDocument;
  $dom->formatOutput = true;
  var_dump($dom->saveXML());

}
catch (\Exception $e) {
  var_dump($e->getMessage());
  var_dump($e->getTraceAsString());
}
