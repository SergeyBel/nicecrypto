<?php

namespace NiceCrypto\Tests\Structure;

use NiceCrypto\Certificate\Pem\PrivateKey;
use PHPUnit\Framework\TestCase;
use NiceCrypto\Certificate\Pem\PemGenerator;

class GeneratePrivateTest extends TestCase
{
    public function testRightClass()
    {
        $g = new PemGenerator();
        $privateKey = $g->generatePrivateKey();
        $this->assertInstanceOf(PrivateKey::class, $privateKey);
    }
}