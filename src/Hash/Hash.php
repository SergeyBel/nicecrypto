<?php

namespace NiceCrypto\Hash;

use NiceCrypto\Exception\HashException;

class Hash
{
    private $algo;

    public function __construct(string $algo)
    {
        $this->algo = $algo;
    }

    public function hash(string $text)
    {
        $hash = openssl_digest($text, $this->algo);
        if ($hash === false) {
            throw new HashException();
        }
        return $hash;
    }
}
