<?php

namespace NiceCrypto\Tests\Certificate\X509;

use NiceCrypto\Certificate\X509\X509;
use NiceCrypto\Certificate\X509\X509Generator;
use NiceCrypto\Tests\Certificate\Csr\CsrFixture;
use NiceCrypto\Tests\Certificate\Pem\PemFixture;
use PHPUnit\Framework\TestCase;

class X509GeneratorTest extends TestCase
{
    public function testX509Generate()
    {
        $gen = new X509Generator();
        $privateKey = PemFixture::getPrivateKey();
        $csr = CsrFixture::getCsr();
        $x509 = $gen->generateX509($csr, $privateKey);
        $this->assertInstanceOf(X509::class, $x509);
        $this->assertNotNull($x509->getResource());
        $this->assertContains('-----BEGIN CERTIFICATE-----', $x509->getAsString());
    }
}
