<?php

namespace NiceCrypto\Hash;

use NiceCrypto\Exception\HashException;

class Hash
{
    private $algorithm;

    public function __construct(string $algorithm)
    {
        $this->algorithm = $algorithm;
    }

    public function hash(string $text)
    {
        $hash = openssl_digest($text, $this->algorithm);
        if ($hash === false) {
            throw new HashException();
        }
        return $hash;
    }

    public function getAlgorithm(): string
    {
        return $this->algorithm;
    }

    public function setAlgorithm(string $algorithm)
    {
        $this->algorithm = $algorithm;
        return $this;
    }
}
