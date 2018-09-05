<?php
/**
 * Created by PhpStorm.
 * User: Xan
 * Date: 2018. 09. 05.
 * Time: 16:29
 */

namespace Exception;


use Throwable;

class NoSuchProductInStores extends \Exception
{
    public function __construct(string $message = "Sorry! No such a products in the stores!", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }


}