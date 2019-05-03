<?php

namespace NiceCrypto\Certificate\Pem;

use NiceCrypto\Certificate\GenerateOptions;
use NiceCrypto\Exception\GenerateException;

class PemGenerator
{
    public function generatePrivateKey(string $passphrase = '', GenerateOptions $options = null): PrivateKey
    {
        if ($options) {
            $config = $options->toArray();
            $resource = openssl_pkey_new($config);
        }
        else {
            $resource = openssl_pkey_new();
        }

        if ($resource === false) {
            throw new GenerateException();
        }


        if (openssl_pkey_export($resource, $pemText, $passphrase) === false) {
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
