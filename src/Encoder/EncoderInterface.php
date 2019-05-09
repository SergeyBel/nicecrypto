<?php

namespace NiceCrypto\Encoder;

/**
 * Interface EncoderInterface
 *
 * @package NiceCrypto\Encoder
 */
interface EncoderInterface
{
    /**
     * @param string $cleanStr
     *
     * @return string
     */
    public function encode(string $cleanStr): string;

    /**
     * @param string $encodedStr
     *
     * @return string
     */
    public function decode(string $encodedStr): string;
}
