<?php

namespace NiceCrypto\Encoder;

use NiceCrypto\Exception\EncodeException;

class Hex implements EncoderInterface
{
    public function decode(string $encodedStr): string
    {
        if (!ctype_xdigit($encodedStr)) {
            throw new EncodeException('value must be hex string');
        }

        return hex2bin($encodedStr);
    }

    public function encode(string $cleanStr): string
    {
        return bin2hex($cleanStr);
    }
}
