<?php

namespace NiceCrypto\AssymetrciCipher;

use NiceCrypto\Certificate\Pem\PrivateKey;
use NiceCrypto\Certificate\PublicKeyInterface;
use NiceCrypto\Encoder\EncoderInterface;
use NiceCrypto\Encoder\Hex;
use NiceCrypto\Exception\AsymmetricCipherException;

class AsymmetricCipher
{
    /** @var EncoderInterface */
    private $encoder;


    public function __construct()
    {
        $this->encoder = new Hex();
    }

    public function encrypt(string $data, PublicKeyInterface $publicKey)
    {
        if (openssl_public_encrypt($data, $cryptedData, $publicKey->getResource()) === false) {
            throw new AsymmetricCipherException();
        }

        return $this->encoder->encode($cryptedData);
    }

    public function decrypt(string $data, PrivateKey $privateKey)
    {
        if (openssl_private_decrypt($this->encoder->decode($data), $decryptedData, $privateKey->getResource()) === false) {
            throw new AsymmetricCipherException();
        }

        return $decryptedData;
    }


    public function setEncoder(EncoderInterface $encoder)
    {
        $this->encoder = $encoder;
        return $this;
    }
}
