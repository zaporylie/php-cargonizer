<?php

include __DIR__ . '/../vendor/autoload.php';

$yaml = new \Symfony\Component\Yaml\Parser();
$settings = \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__.'/config.yml'));


try {
  \zaporylie\Cargonizer\Config::set('endpoint', $settings['endpoint']);
  \zaporylie\Cargonizer\Config::set('secret', $settings['secret']);
  \zaporylie\Cargonizer\Config::set('sender', $settings['sender']);

  /** @var \zaporylie\Cargonizer\Data\TransportAgreement[] $result */
  $result = (new \zaporylie\Cargonizer\Agreements())->getAgreements();
  foreach ($result as $transportAgreement) {
    echo '<strong>' . $transportAgreement->getCarrier()->getName() . ':</strong><br>';
    foreach ($transportAgreement->getProducts() as $product) {
      echo $product->getIdentifier() . ' - ' . $product->getName() . '<br>';
    }
  }

}
catch (\Exception $e) {
  var_dump($e->getMessage());
  var_dump($e->getTraceAsString());
}
