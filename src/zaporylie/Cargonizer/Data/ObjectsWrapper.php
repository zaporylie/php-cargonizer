<?php

namespace zaporylie\Cargonizer\Data;

abstract class ObjectsWrapper implements \IteratorAggregate
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
}
