<?php

namespace NiceCrypto\Signature;

use NiceCrypto\Certificate\Pem\PrivateKey;
use NiceCrypto\Certificate\PublicKeyInterface;
use NiceCrypto\Encoder\EncoderInterface;
use NiceCrypto\Encoder\Hex;
use NiceCrypto\Exception\SignatureException;
use NiceCrypto\Hash\Hash;

/**
 * Class Signature
 *
 * @package NiceCrypto\Signature
 */
class Signature
{
    private $hash;
    private $encoder;

    public function __construct(Hash $hash)
    {
        $this->hash = $hash;
        $this->encoder = new Hex();
    }

    /**
     * Sign data
     * @param string                                 $data
     * @param \NiceCrypto\Certificate\Pem\PrivateKey $privateKey
     *
     * @return string
     * @throws \NiceCrypto\Exception\SignatureException
     */
    public function sign(string $data, PrivateKey $privateKey)
    {
        openssl_sign($data, $signature, $privateKey->getResource(), $this->hash->getAlgorithm());
        if ($signature === false) {
            throw new SignatureException();
        }
        return $this->encoder->encode($signature);
    }

    /**
     * Verify data signature
     * @param string                                     $data
     * @param string                                     $signature
     * @param \NiceCrypto\Certificate\PublicKeyInterface $publicKey
     *
     * @return bool
     * @throws \NiceCrypto\Exception\EncodeException
     * @throws \NiceCrypto\Exception\SignatureException
     */
    public function verify(string $data, string $signature, PublicKeyInterface $publicKey)
    {
        $decodedSignature = $this->encoder->decode($signature);
        $verify = openssl_verify($data, $decodedSignature, $publicKey->getResource(), $this->hash->getAlgorithm());
        if ($verify === -1) {
            throw new SignatureException();
        }

        return (bool)$verify;
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
