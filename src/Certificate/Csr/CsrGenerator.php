<?php

namespace NiceCrypto\Certificate\Csr;

use NiceCrypto\Certificate\GenerateOptions;
use NiceCrypto\Certificate\Pem\PrivateKey;
use NiceCrypto\Exception\CsrException;

/**
 * Class CsrGenerator
 *
 * @package NiceCrypto\Certificate\Csr
 */
class CsrGenerator
{
    /**
     * Generate new csr certificate
     * @param \NiceCrypto\Certificate\Csr\CsrInfo          $dn
     * @param \NiceCrypto\Certificate\Pem\PrivateKey       $privateKey
     * @param \NiceCrypto\Certificate\GenerateOptions|null $options
     *
     * @return \NiceCrypto\Certificate\Csr\Csr
     * @throws \NiceCrypto\Exception\CsrException
     */
    public function generateCsr(CsrInfo $dn, PrivateKey $privateKey, GenerateOptions $options = null): Csr
    {
        $privateKeyResource = $privateKey->getResource();
        if ($options === null) {
            $resource = openssl_csr_new($dn->toArray(), $privateKeyResource);
        } else {
            $resource = openssl_csr_new($dn->toArray(), $privateKeyResource, $options->toArray());
        }

        if ($resource === null) {
            throw new CsrException();
        }

        $text = null;
        if (openssl_csr_export($resource, $text) === false) {
            throw new CsrException();
        }
        return new Csr($text);
    }
}
