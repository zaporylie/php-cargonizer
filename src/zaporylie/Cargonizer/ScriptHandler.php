<?php

/**
 * Composer scripts.
 *
 * Helper class with static methods which can react to composer events.
 */

namespace zaporylie\Cargonizer;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;

/**
 * Class ScriptHandler
 * @package Cargonizer
 */
class ScriptHandler
{

  /**
   * Generate dummy yaml.
   */
  public static function createExamplesConfigFile()
  {
    $fs = new Filesystem();
    $root = __DIR__ . '/../examples/';
    if (!$fs->exists($root . 'config.yml')) {
      $settings = [
        'endpoint' => '',
        'secret' => '',
        'sender' => '',
      ];
      $content = Yaml::dump($settings);
      $fs->dumpFile($root . 'config.yml', $content);
    }
  }
}
