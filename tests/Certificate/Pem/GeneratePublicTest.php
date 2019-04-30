<?php

namespace NiceCrypto\Tests\Structure;

use NiceCrypto\Certificate\Pem\PemGenerator;
use NiceCrypto\Certificate\Pem\PublicKey;
use NiceCrypto\Tests\Certificate\Pem\PrivateKeyFixture;
use PHPUnit\Framework\TestCase;

class GeneratePublicTest extends TestCase
{
    public function testRightClass()
    {
        $g = new PemGenerator();
        $privateKey = PrivateKeyFixture::getPrivateKey();
        $publicKey = $g->generatePublicKey($privateKey);
        $this->assertInstanceOf(PublicKey::class, $publicKey);
    }
}
