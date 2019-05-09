<?php

namespace NiceCrypto\Certificate\X509;

use NiceCrypto\Certificate\Csr\Csr;
use NiceCrypto\Certificate\GenerateOptions;
use NiceCrypto\Certificate\Pem\PrivateKey;
use NiceCrypto\Exception\X509Exception;

/**
 * Class X509Generator
 *
 * @package NiceCrypto\Certificate\X509
 */
class X509Generator
{
    /**
     * Generate new x509 certificate from csr and private key
     * @param \NiceCrypto\Certificate\Csr\Csr              $csr
     * @param \NiceCrypto\Certificate\Pem\PrivateKey       $privateKey
     * @param string|null                                  $cacert
     * @param int                                          $days
     * @param \NiceCrypto\Certificate\GenerateOptions|null $options
     *
     * @return \NiceCrypto\Certificate\X509\X509
     * @throws \NiceCrypto\Exception\X509Exception
     */
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
