<?php

namespace NiceCrypto\Certificate\Pem;

use NiceCrypto\Certificate\PublicKeyInterface;
use NiceCrypto\Exception\PemException;

class PublicKey implements PublicKeyInterface
{
    private $resource;
    private $text;

    public function __construct(string $text)
    {
        $this->resource = openssl_pkey_get_public($text);
        if ($this->resource === false) {
            throw new PemException();
        }
        $this->text = $text;
    }

    public function getResource()
    {
        return $this->resource;
    }

    public function toString()
    {
        return $this->text;
    }

}
