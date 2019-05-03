<?php

namespace NiceCrypto\Tests\Certificate\Pem;

use NiceCrypto\Certificate\Pem\PrivateKey;
use NiceCrypto\Certificate\PrivateKeyTypes;
use NiceCrypto\Exception\PemException;
use PHPUnit\Framework\TestCase;

class PrivateKeyTest extends TestCase
{
    public function testSimpleCreate()
    {
        $text = PemFixture::getPrivateKeyText();
        $privateKey = new PrivateKey($text);
        $this->assertInstanceOf(PrivateKey::class, $privateKey);
        $this->assertEquals($text, $privateKey->toString());
    }

    public function testIncorrectText()
    {
        $text = 'bad key';
        $this->expectException(PemException::class);
        $privateKey = new PrivateKey($text);
    }

    public function testPassphraseCreate()
    {
        $text = PemFixture::getEncryptedPrivateKeyText();
        $pass = PemFixture::PASSPHRASE;
        $privateKey = new PrivateKey($text, $pass);
        $this->assertInstanceOf(PrivateKey::class, $privateKey);
        $this->assertEquals($text, $privateKey->toString());
    }

    public function testIncorrectPass()
    {
        $text = PemFixture::getEncryptedPrivateKeyText();
        $pass = 'incorrect passphrase';
        $this->expectException(PemException::class);
        $privateKey = new PrivateKey($text, $pass);
    }

    public function testOptions()
    {
        $text = PemFixture::getPrivateKeyText();
        $privateKey = new PrivateKey($text);
        $this->assertInstanceOf(PrivateKey::class, $privateKey);
        $this->assertEquals($text, $privateKey->toString());
        $this->assertEquals(PemFixture::BITS, $privateKey->getBits());
        $this->assertEquals(PemFixture::TYPE, $privateKey->getType());
    }
}