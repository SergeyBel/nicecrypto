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

    /**
     * Encrypt data by key with initialize vector iv
     * @param string $data
     * @param string $key
     * @param string $iv
     *
     * @return string
     * @throws \NiceCrypto\Exception\CipherException
     * @throws \NiceCrypto\Exception\EncodeException
     */
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

    /**
     * Dencrypt data by key with initialize vector iv
     * @param string $data
     * @param string $key
     * @param string $iv
     *
     * @return string
     * @throws \NiceCrypto\Exception\CipherException
     * @throws \NiceCrypto\Exception\EncodeException
     */
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

    /**
     * Get bytes length of initial value of choose cipher
     * @return int
     * @throws \NiceCrypto\Exception\CipherException
     */
    public function getIvBytesLength()
    {
        $bytesLength = openssl_cipher_iv_length($this->cipherMethodString());
        if ($bytesLength === false) {
            throw new CipherException();
        }
        return $bytesLength;
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

    /**
     * @return string
     */
    private function cipherMethodString()
    {
        return $this->algorithm.'-'.$this->mode;
    }
}
