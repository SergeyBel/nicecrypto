<?php

namespace NiceCrypto\Certificate\Pem;

use NiceCrypto\Certificate\GenerateOptions;
use NiceCrypto\Exception\GenerateException;

class PemGenerator
{
    public function generatePrivateKey(GenerateOptions $options = null): PrivateKey
    {
        if ($options) {
            $config = $options->toArray();
            $resource = openssl_pkey_new($config);
        } else {
            $resource = openssl_pkey_new();
        }

        if ($resource === false) {
            throw new GenerateException();
        }

        $passphrase = !is_null($options) ? $options->getPassphrase(): null;

        if ($passphrase !== null) {
            $keyData = openssl_pkey_export($resource, $pemText, $passphrase);
        } else {
            $keyData = openssl_pkey_export($resource, $pemText);
        }


        if ($keyData === false) {
            throw new GenerateException();
        }

        return new PrivateKey($pemText, $passphrase);
    }

    public function generatePublicKey(PrivateKey $privateKey): PublicKey
    {
        $privateKeyData = openssl_pkey_get_details($privateKey->getResource());
        return new PublicKey($privateKeyData['key']);
    }
}
