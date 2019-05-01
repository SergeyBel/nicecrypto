<?php

namespace NiceCrypto\Signature;

use NiceCrypto\Certificate\Pem\PrivateKey;
use NiceCrypto\Certificate\PublicKeyInterface;
use NiceCrypto\Exception\SignatureException;
use NiceCrypto\Hash\Hash;
use NiceCrypto\Hex\HexProcessing;

class Signature extends HexProcessing
{
    private $hash;

    public function __construct(Hash $hash)
    {
        $this->hash = $hash;
    }

    public function sign(string $data, PrivateKey $privateKey)
    {
        openssl_sign($data, $signature, $privateKey->getResource(), $this->hash->getAlgorithm());
        if ($signature === false) {
            throw new SignatureException();
        }
        return $this->encodeHex($signature);
    }

    public function verify(string $data, string $signature, PublicKeyInterface $publicKey)
    {
        $decodedSignature = $this->decodeHex($signature);
        $verify = openssl_verify($data, $decodedSignature, $publicKey->getResource(), $this->hash->getAlgorithm());
        if ($verify === -1) {
            throw new SignatureException();
        }

        return (bool)$verify;
    }
}
