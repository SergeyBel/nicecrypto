<?php

namespace NiceCrypto\Tests\Certificate\Pem;


use NiceCrypto\Certificate\GenerateOptions;
use NiceCrypto\Certificate\PrivateKeyTypes;
use NiceCrypto\Certificate\Pem\PrivateKey;
use NiceCrypto\Hash\HashAlgorithms;
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
        $options->setBits(2048)->setDigestAlgo(HashAlgorithms::SHA256);
        $g = new PemGenerator();
        $privateKey = $g->generatePrivateKey('', $options);
        $this->assertEquals(2048, $privateKey->getBits());
    }

    public function testKeyType()
    {
        $options = new GenerateOptions();
        $options->setType(PrivateKeyTypes::KEYTYPE_RSA)->setDigestAlgo(HashAlgorithms::SHA256);
        $g = new PemGenerator();
        $privateKey = $g->generatePrivateKey('', $options);
        $this->assertEquals(PrivateKeyTypes::KEYTYPE_RSA, $privateKey->getType());
    }

    public function testPassphrase()
    {
        $pass = '123456';
        $g = new PemGenerator();
        $privateKey = $g->generatePrivateKey($pass);
        $this->assertInstanceOf(PrivateKey::class, $privateKey);
    }

    public function testGenerateNotEncrytedKey()
    {
        $g = new PemGenerator();
        $privateKey = $g->generatePrivateKey();
        $this->assertContains('BEGIN PRIVATE KEY', $privateKey->toString());
    }

    public function testGenerateEncrytedKey()
    {
        $g = new PemGenerator();
        $privateKey = $g->generatePrivateKey('password');
        $this->assertContains('BEGIN ENCRYPTED PRIVATE KEY', $privateKey->toString());
    }
}