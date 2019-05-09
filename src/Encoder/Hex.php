<?php

namespace NiceCrypto\Encoder;

use NiceCrypto\Exception\EncodeException;

/**
 * Class Hex
 *
 * @package NiceCrypto\Encoder
 */
class Hex implements EncoderInterface
{
    /**
     * @param string $encodedStr
     *
     * @return string
     * @throws \NiceCrypto\Exception\EncodeException
     */
    public function decode(string $encodedStr): string
    {
        if (!ctype_xdigit($encodedStr)) {
            throw new EncodeException('value must be hex string');
        }

        return hex2bin($encodedStr);
    }

    /**
     * @param string $cleanStr
     *
     * @return string
     */
    public function encode(string $cleanStr): string
    {
        return bin2hex($cleanStr);
    }
}
