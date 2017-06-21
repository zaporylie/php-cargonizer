<?php

namespace zaporylie\Cargonizer;

use GuzzleHttp\Exception\ClientException;
use Http\Client\Exception\NetworkException;
use Http\Client\Exception\RequestException;
use Http\Discovery\MessageFactoryDiscovery;

/**
 * Class Client
 *
 * @package zaporylie\Cargonizer
 */
abstract class Client {

  protected $resource = NULL;
  protected $method = NULL;

  /**
   * @var \Http\Client\HttpAsyncClient|\Http\Client\HttpClient
   */
  protected $client;

  /**
   * @var \Http\Message\MessageFactory
   */
  protected $messageFactoryDiscovery;

  public function __construct($client = NULL) {
    $this->client = Config::clientFactory($client);
  }

  /**
   * @return mixed
   * @throws \Exception
   */
  public function getResource() {
    if (!isset($this->resource)) {
      throw new \Exception('Undefined resource');
    }
    return $this->resource;
  }

  /**
   * @return null
   * @throws \Exception
   */
  public function getMetod() {
    if (!isset($this->method)) {
      throw new \Exception('Undefined method');
    }
    return $this->method;
  }

  /**
   * @param array $headers
   * @param null $data
   *
   * @return mixed
   * @throws \Exception
   */
  protected function request(array $headers = [], $data = NULL) {
    $headers += [
      'X-Cargonizer-Key' => Config::get('secret'),
      'X-Cargonizer-Sender' => Config::get('sender'),
    ];
    try {
      // Build request.
      $request = $this->messageFactoryDiscovery()->createRequest(
        $this->getMetod(),
        Config::get('endpoint') . $this->getResource(),
        $headers,
        $data
      );
      // Make a request.
      $response = $this->client->sendRequest($request);
      $xml = simplexml_load_string($response->getBody()->getContents());
      if (isset($xml->error)) {
        throw new CargonizerException((string) $xml->error, $request);
      }
      return $xml;
    } catch (RequestException $e) {
      throw $e;
    } catch (\Exception $e) {
      throw new \Exception($e->getMessage(), $e->getCode(), $e);
    }
  }

  /**
   * @return \Http\Message\MessageFactory
   */
  protected function messageFactoryDiscovery() {
    if (!isset($this->messageFactory)) {
      $this->messageFactory = MessageFactoryDiscovery::find();
    }
    return $this->messageFactory;
  }

}
