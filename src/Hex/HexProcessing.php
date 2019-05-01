<?php

namespace NiceCrypto\Hex;

use NiceCrypto\Exception\ArgumentException;

class HexProcessing
{
    public function decodeHex(string $hexStr)
    {
        if (!ctype_xdigit($hexStr)) {
            throw new ArgumentException('value must be hex string');
        }

        return hex2bin($hexStr);
    }

    public function encodeHex(string $binStr)
    {
        return bin2hex($binStr);
    }
}
