<?php

namespace NiceCrypto\Cipher;

use NiceCrypto\Exception\ArgumentException;
use NiceCrypto\Exception\CipherException;
use NiceCrypto\Hex\HexProcessing;
use NiceCrypto\Random\RandomGenerator;

class Cipher extends HexProcessing
{
    private $algorithm;
    private $mode;

    public function __construct(string $algorithm, string $mode)
    {
        $this->algorithm = $algorithm;
        $this->mode = $mode;
    }

    public function encrypt(string $data, string $key, string $iv)
    {
        $decodedKey = $this->decodeHex($key);
        $decodedIv = $this->decodeHex($iv);
        $encryptedData = openssl_encrypt($data, $this->cipherMethodString(), $decodedKey, 0, $decodedIv);
        if ($encryptedData === false) {
            throw new CipherException();
        }

        return $this->encodeHex($encryptedData);
    }

    public function decrypt(string $data, string $key, string $iv)
    {
        $decodedKey = $this->decodeHex($key);
        $decodedData = $this->decodeHex($data);
        $decodedIv = $this->decodeHex($iv);
        $decryptedData = openssl_decrypt($decodedData, $this->cipherMethodString(), $decodedKey, 0, $decodedIv);
        if ($decryptedData === false) {
            throw new CipherException();
        }
        return $decryptedData;
    }

    public function getIvBytesLength()
    {
        $bytesLength = openssl_cipher_iv_length($this->cipherMethodString());
        if ($bytesLength === false) {
            throw new CipherException();
        }
        return $bytesLength;
    }

    private function cipherMethodString()
    {
        return $this->algorithm.'-'.$this->mode;
    }
}
