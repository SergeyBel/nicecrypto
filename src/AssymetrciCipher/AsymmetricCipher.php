<?php

namespace NiceCrypto\AssymetrciCipher;

use NiceCrypto\Certificate\Pem\PrivateKey;
use NiceCrypto\Certificate\PublicKeyInterface;
use NiceCrypto\Encoder\EncoderInterface;
use NiceCrypto\Encoder\Hex;
use NiceCrypto\Exception\AsymmetricCipherException;

/**
 * Class AsymmetricCipher
 *
 * @package NiceCrypto\AssymetrciCipher
 */
class AsymmetricCipher
{
    /** @var EncoderInterface */
    private $encoder;


    public function __construct()
    {
        $this->encoder = new Hex();
    }


    /**
     * @param string                                     $data
     * @param \NiceCrypto\Certificate\PublicKeyInterface $publicKey
     *
     * @return string
     * @throws \NiceCrypto\Exception\AsymmetricCipherException
     */
    public function encrypt(string $data, PublicKeyInterface $publicKey)
    {
        if (openssl_public_encrypt($data, $cryptedData, $publicKey->getResource()) === false) {
            throw new AsymmetricCipherException();
        }

        return $this->encoder->encode($cryptedData);
    }


    /**
     * @param string                                 $data
     * @param \NiceCrypto\Certificate\Pem\PrivateKey $privateKey
     *
     * @return mixed
     * @throws \NiceCrypto\Exception\AsymmetricCipherException
     * @throws \NiceCrypto\Exception\EncodeException
     */
    public function decrypt(string $data, PrivateKey $privateKey)
    {
        if (openssl_private_decrypt($this->encoder->decode($data), $decryptedData, $privateKey->getResource()) === false) {
            throw new AsymmetricCipherException();
        }

        return $decryptedData;
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
