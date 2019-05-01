<?php

namespace NiceCrypto\Signature;

use NiceCrypto\Certificate\Pem\PrivateKey;
use NiceCrypto\Certificate\PublicKeyInterface;
use NiceCrypto\Encoder\EncoderInterface;
use NiceCrypto\Encoder\Hex;
use NiceCrypto\Exception\SignatureException;
use NiceCrypto\Hash\Hash;

class Signature
{
    private $hash;
    private $encoder;

    public function __construct(Hash $hash)
    {
        $this->hash = $hash;
        $this->encoder = new Hex();
    }

    public function sign(string $data, PrivateKey $privateKey)
    {
        openssl_sign($data, $signature, $privateKey->getResource(), $this->hash->getAlgorithm());
        if ($signature === false) {
            throw new SignatureException();
        }
        return $this->encoder->encode($signature);
    }

    public function verify(string $data, string $signature, PublicKeyInterface $publicKey)
    {
        $decodedSignature = $this->encoder->decode($signature);
        $verify = openssl_verify($data, $decodedSignature, $publicKey->getResource(), $this->hash->getAlgorithm());
        if ($verify === -1) {
            throw new SignatureException();
        }

        return (bool)$verify;
    }

    public function setEncoder(EncoderInterface $encoder)
    {
        $this->encoder = $encoder;
        return $this;
    }
}
