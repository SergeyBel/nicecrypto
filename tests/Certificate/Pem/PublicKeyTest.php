<?php

namespace NiceCrypto\Tests\Certificate\Pem;

use NiceCrypto\Certificate\Pem\PublicKey;
use NiceCrypto\Exception\PemException;
use PHPUnit\Framework\TestCase;

class PublicKeyTest extends TestCase
{
    public function testCreate()
    {
        $text = PemFixture::getPublicKeyText();
        $publicKey = new PublicKey($text);
        $this->assertInstanceOf(PublicKey::class, $publicKey);
        $this->assertEquals($text, $publicKey->getAsString());
    }

    public function testIncorrectText()
    {
        $text = 'incorrect key';
        $this->expectException(PemException::class);
        $publicKey = new PublicKey($text);
    }

}
