<?php

namespace zaporylie\Cargonizer\Data;

abstract class ObjectsWrapper implements \Iterator
{

  /**
   * Array of mixed objects.
   *
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
   * Remove item from array.
   *
   * @param string|int $delta
   *
   * @return self
   */
  public function removeItem($delta) {
    if (isset($this->array[$delta])) {
      unset($this->array[$delta]);
    }
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function rewind() {
    return reset($this->array);
  }

  /**
   * {@inheritdoc}
   */
  public function current() {
    return current($this->array);
  }

  /**
   * {@inheritdoc}
   */
  public function key() {
    return key($this->array);
  }

  /**
   * {@inheritdoc}
   */
  public function next() {
    return next($this->array);
  }

  /**
   * {@inheritdoc}
   */
  public function valid() {
    return key($this->array) !== null;
  }

}
