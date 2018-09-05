<?php
/**
 * Created by PhpStorm.
 * User: Xan
 * Date: 2018. 09. 05.
 *
 * Time: 16:25
 */

namespace Exception;


use Throwable;

class StoreIsFullException extends \Exception
{
    public function __construct(string $message = "Sorry! The store is full!", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }


}