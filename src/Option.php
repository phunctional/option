<?php

namespace Phunctional\Option;

use Phunctional\Functor;
use Phunctional\Monad;

/**
 * @method Option map(callable $f)
 * @method Option flatMap(callable $f)
 */
interface Option/*[T]*/ extends Functor/*[T]*/, Monad/*[T]*/
{
    public function isEmpty(): bool;

    /**
     * @return mixed $value of type T
     * @throws EmptyOptionException
     */
    public function get();

    /**
     * @param mixed $value of type T
     * @return mixed $value of type T
     */
    public function getOrElse($value);
}
