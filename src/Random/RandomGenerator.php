<?php

namespace NiceCrypto\Random;

use NiceCrypto\Exception\ArgumentException;
use NiceCrypto\Exception\GenerateException;

class RandomGenerator
{
    public function generateRandomBytes(int $bytesLength)
    {
        $key = openssl_random_pseudo_bytes($bytesLength, $strongCrypto);

        if ($strongCrypto === false) {
            throw new ArgumentException('openssl generator is not crypto strong');
        }

        if ($key === false) {
            throw new GenerateException();
        }

        return bin2hex($key);
    }
}

