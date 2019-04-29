<?php

namespace NiceCrypto\Tests\Structure;


use NiceCrypto\Certificate\GenerateOptions;
use NiceCrypto\Certificate\KeyTypeEnum;
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

    public function testBitsLength()
    {
        $options = new GenerateOptions();
        $options->setBits(2048);
        $g = new PemGenerator();
        $privateKey = $g->generatePrivateKey($options);
        $this->assertEquals(2048, $privateKey->getBits());
    }

    public function testKeyType()
    {
        $options = new GenerateOptions();
        $options->setType(KeyTypeEnum::KEYTYPE_RSA);
        $g = new PemGenerator();
        $privateKey = $g->generatePrivateKey($options);
        $this->assertEquals(KeyTypeEnum::KEYTYPE_RSA, $privateKey->getType());
    }
}