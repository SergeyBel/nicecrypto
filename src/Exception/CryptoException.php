<?php

namespace NiceCrypto\Exception;

use Throwable;

/**
 * Class CryptoException
 *
 * @package NiceCrypto\Exception
 */
class CryptoException extends \Exception
{
    public function __construct()
    {
        $message = openssl_error_string();
        parent::__construct($message);
    }
}
