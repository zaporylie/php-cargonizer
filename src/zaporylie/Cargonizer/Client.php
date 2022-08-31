<?php

namespace zaporylie\Cargonizer;

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
      /** @var \Psr\Http\Message\RequestInterface $request */
      $request = $this->messageFactoryDiscovery()->createRequest(
        $this->getMetod(),
        Config::get('endpoint') . $this->getResource() . ($this->getMetod() == 'GET' && !empty($data) ? '?' . http_build_query($data) : NULL),
        $headers,
        $this->getMetod() == 'GET' ? NULL : $data
      );
      // Make a request.
      $response = $this->client->sendRequest($request);
      $content = $response->getBody()->getContents();
      $xml = @simplexml_load_string($content);
      // Handle errors.
      if ($response->getStatusCode() === 400 && !isset($xml->error) && !isset($xml->consignment->errors->error)) {
        throw new CargonizerException((string) $content, $request);
      }
      elseif (isset($xml->error)) {
        throw new CargonizerException((string) $xml->error, $request);
      }
      elseif (isset($xml->consignment->errors->error)) {
        throw new CargonizerException((string) $xml->consignment->errors->error, $request);
      }

      // Return XML response.
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
