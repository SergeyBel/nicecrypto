<?php

namespace NiceCrypto\Tests\Certificate\Csr;

use NiceCrypto\Certificate\Csr\Csr;
use NiceCrypto\Certificate\Csr\CsrGenerator;
use NiceCrypto\Certificate\GenerateOptions;
use NiceCrypto\Certificate\PrivateKeyType;
use NiceCrypto\Hash\HashAlgorithm;
use NiceCrypto\Tests\Certificate\Pem\PemFixture;
use PHPUnit\Framework\TestCase;

class CsrGeneratorTest extends TestCase
{
    public function testGenerateCsr()
    {
        $generator = new CsrGenerator();
        $privateKey = PemFixture::getPrivateKey();
        $dn = CsrFixture::getCsrInfo();
        $csr = $generator->generateCsr($dn, $privateKey);
        $this->assertInstanceOf(Csr::class, $csr);
        $this->assertEquals(CsrFixture::getCsrText(), $csr->getAsString());
    }

    public function testGenerateCsrWithOptions()
    {
        $generator = new CsrGenerator();
        $privateKey = PemFixture::getPrivateKey();
        $dn = CsrFixture::getCsrInfo();
        $opts = new GenerateOptions();
        $opts->setDigestAlgo(HashAlgorithm::SHA512);
        $csr = $generator->generateCsr($dn, $privateKey, $opts);
        $this->assertInstanceOf(Csr::class, $csr);
        $this->assertContains('-----BEGIN CERTIFICATE REQUEST-----', $csr->getAsString());
    }
}
