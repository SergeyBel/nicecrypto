<?php

namespace NiceCrypto\Cipher;

use NiceCrypto\Encoder\EncoderInterface;
use NiceCrypto\Encoder\Hex;
use NiceCrypto\Exception\CipherException;

class Cipher
{
    private $algorithm;
    private $mode;
    private $encoder;

    public function __construct(string $algorithm, string $mode)
    {
        $this->algorithm = $algorithm;
        $this->mode = $mode;
        $this->encoder = new Hex();
    }

    public function encrypt(string $data, string $key, string $iv)
    {
        $decodedKey = $this->encoder->decode($key);
        $decodedIv = $this->encoder->decode($iv);
        $encryptedData = openssl_encrypt($data, $this->cipherMethodString(), $decodedKey, 0, $decodedIv);
        if ($encryptedData === false) {
            throw new CipherException();
        }

        return $this->encoder->encode($encryptedData);
    }

    public function decrypt(string $data, string $key, string $iv)
    {
        $decodedKey = $this->encoder->decode($key);
        $decodedData = $this->encoder->decode($data);
        $decodedIv = $this->encoder->decode($iv);
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

    public function setEncoder(EncoderInterface $encoder)
    {
        $this->encoder = $encoder;
        return $this;
    }

    private function cipherMethodString()
    {
        return $this->algorithm.'-'.$this->mode;
    }
}
