<?php

namespace NiceCrypto\Random;

use NiceCrypto\Encoder\EncoderInterface;
use NiceCrypto\Encoder\Hex;
use NiceCrypto\Exception\ArgumentException;
use NiceCrypto\Exception\GenerateException;

/**
 * Class RandomBytesGenerator
 *
 * @package NiceCrypto\Random
 */
class RandomBytesGenerator
{
    private $encoder;

    public function __construct()
    {
        $this->encoder = new Hex();
    }

    /**
     * @param int $bytesLength
     *
     * @return string
     * @throws \NiceCrypto\Exception\ArgumentException
     * @throws \NiceCrypto\Exception\GenerateException
     */
    public function generateRandomBytes(int $bytesLength)
    {
        $key = openssl_random_pseudo_bytes($bytesLength, $strongCrypto);

        if ($strongCrypto === false) {
            throw new ArgumentException('openssl generator is not crypto strong');
        }

        if ($key === false) {
            throw new GenerateException();
        }

        return $this->encoder->encode($key);
    }

    /**
     * @param \NiceCrypto\Encoder\EncoderInterface $encoder
     *
     * @return $this
     */
    public function setEncoder(EncoderInterface $encoder)
    {
        $this->encoder = $encoder;
        return $this;
    }
}
