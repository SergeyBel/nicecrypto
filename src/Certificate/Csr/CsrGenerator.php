<?php

namespace NiceCrypto\Certificate\Csr;

use NiceCrypto\Certificate\Generator\CsrInfo;
use NiceCrypto\Certificate\Generator\GenerateOptions;
use NiceCrypto\Certificate\Pem\PrivateKey;

class CsrGenerator
{
    public function generateCsr(CsrInfo $dn, PrivateKey $privateKey, GenerateOptions $options = null): Csr
    {

    }

    public function generatePublicCsr(Csr $csr): CsrPublic
    {

    }
}
