<?php

namespace NiceCrypto\Certificate\X509;

use NiceCrypto\Certificate\Csr\Csr;
use NiceCrypto\Certificate\GenerateOptions;
use NiceCrypto\Certificate\Pem\PrivateKey;
use NiceCrypto\Exception\X509Exception;

class X509Generator
{
    public function generateX509(Csr $csr, PrivateKey $privateKey, string $cacert = null, int $days = 365, GenerateOptions $options = null): X509
    {
        if ($options === null) {
            $x509 =  openssl_csr_sign($csr->getAsString(), $cacert, $privateKey->getResource(), $days);
        } else {
            $x509 = openssl_csr_sign($csr->getAsString(), $cacert, $privateKey->getResource(), $days, $options->toArray());
        }

        if ($x509 === false) {
            throw new X509Exception();
        }

        if (openssl_x509_export($x509, $x509Text) === false) {
            throw new X509Exception();
        }
        return new X509($x509Text);
    }
}
