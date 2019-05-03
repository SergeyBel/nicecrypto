<?php

namespace NiceCrypto\Exception;

use Throwable;

class CryptoException extends \Exception
{
    public function __construct()
    {
        $message = openssl_error_string();
        parent::__construct($message);
    }
}
