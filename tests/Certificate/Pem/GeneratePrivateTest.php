<?php

namespace NiceCrypto\Tests\Certificate\Pem;


use NiceCrypto\Certificate\GenerateOptions;
use NiceCrypto\Certificate\PrivateKeyTypes;
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
        $options->setType(PrivateKeyTypes::KEYTYPE_RSA);
        $g = new PemGenerator();
        $privateKey = $g->generatePrivateKey($options);
        $this->assertEquals(PrivateKeyTypes::KEYTYPE_RSA, $privateKey->getType());
    }

    public function testPassphrase()
    {
        $pass = '123456';
        $g = new PemGenerator();
        $opts = new GenerateOptions();
        $opts->setPassphrase($pass);
        $privateKey = $g->generatePrivateKey($opts);
        $this->assertInstanceOf(PrivateKey::class, $privateKey);
    }

    public function testGenerateNotEncrytedKey()
    {
        $g = new PemGenerator();
        $privateKey = $g->generatePrivateKey();
        $this->assertContains('BEGIN PRIVATE KEY', $privateKey->getAsString());
    }

    public function testGenerateEncrytedKey()
    {
        $g = new PemGenerator();
        $opts = new GenerateOptions();
        $opts->setPassphrase('password');
        $privateKey = $g->generatePrivateKey($opts);
        $this->assertContains('BEGIN ENCRYPTED PRIVATE KEY', $privateKey->getAsString());
    }
}