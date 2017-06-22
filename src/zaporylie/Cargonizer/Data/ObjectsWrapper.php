<?php

namespace zaporylie\Cargonizer\Data;

abstract class ObjectsWrapper implements \Iterator
{

  /**
   * @var array
   */
  protected $array = [];

  /**
   * {@inheritdoc}
   */
  public function getIterator() {
    return new \ArrayIterator($this->array);
  }

  /**
   * @param $delta
   *
   * @return self
   */
  public function removeItem($delta) {
    if (isset($this->array[$delta])) {
      unset($this->array[$delta]);
    }
    return $this;
  }

  function rewind() {
    reset($this->array);
  }

  function current() {
    return current($this->array);
  }

  function key() {
    return key($this->array);
  }

  function next() {
    next($this->array);
  }

  function valid() {
    return key($this->array) !== null;
  }
}
