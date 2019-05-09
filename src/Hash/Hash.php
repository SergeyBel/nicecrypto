<?php

namespace NiceCrypto\Hash;

use NiceCrypto\Exception\HashException;

/**
 * Class Hash
 *
 * @package NiceCrypto\Hash
 */
class Hash
{
    private $algorithm;

    public function __construct(string $algorithm)
    {
        $this->algorithm = $algorithm;
    }

    /**
     * @param string $text
     *
     * @return string
     * @throws \NiceCrypto\Exception\HashException
     */
    public function hash(string $text)
    {
        $hash = openssl_digest($text, $this->algorithm);
        if ($hash === false) {
            throw new HashException();
        }
        return $hash;
    }

    /**
     * @return string
     */
    public function getAlgorithm(): string
    {
        return $this->algorithm;
    }

    /**
     * @param string $algorithm
     *
     * @return $this
     */
    public function setAlgorithm(string $algorithm)
    {
        $this->algorithm = $algorithm;
        return $this;
    }
}
