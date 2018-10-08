<?php

namespace zaporylie\Cargonizer;

use Http\Client\HttpAsyncClient;
use Http\Client\HttpClient;
use Http\Discovery\HttpClientDiscovery;

/**
 * Class Config
 *
 * @package zaporylie\Cargonizer
 */
class Config
{
  const SANDBOX = 'https://sandbox.cargonizer.no';
  const PRODUCTION = 'https://cargonizer.no';

  protected static $config = [
    'endpoint' => self::SANDBOX,
    'sender' => NULL,
    'secret' => NULL,
  ];

  private function __construct() {} // make this private so we can't instanciate
  private function __wakeup() {} // make this private so we can't instanciate

  public static function set($key, $val)
  {
    self::$config[$key] = $val;
  }

  public static function get($key)
  {
    return self::$config[$key];
  }

  /**
   * Use this static method to get default HTTP Client.
   *
   * @param null|HttpClient|HttpAsyncClient $client
   *
   * @return HttpClient|HttpAsyncClient
   */
  public static function clientFactory($client = null)
  {
    if (isset($client) && ($client instanceof HttpAsyncClient || $client instanceof HttpClient)) {
      return $client;
    } elseif (isset($client)) {
      throw new \LogicException(sprintf(
        'HttpClient must be instance of "%s" or "%s"',
        HttpClient::class,
        HttpAsyncClient::class
      ));
    }
    return HttpClientDiscovery::find();
  }

}
