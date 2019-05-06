<?php

namespace NiceCrypto\Tests\Certificate\X509;

use NiceCrypto\Certificate\X509\X509;
use PHPUnit\Framework\TestCase;

class X509Test extends TestCase
{
    public function testX509Create()
    {
        $text = X509Fixture::getX509String();
        $x509 = new X509($text);
        $this->assertInstanceOf(X509::class, $x509);
        $this->assertNotNull($x509->getResource());
        $this->assertContains('-----BEGIN CERTIFICATE-----', $x509->getAsString());
    }
}
