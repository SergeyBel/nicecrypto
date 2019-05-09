<?php

namespace NiceCrypto\Tests\AsymmetricCipher;

use NiceCrypto\AssymetrciCipher\AsymmetricCipher;
use NiceCrypto\Tests\Certificate\Pem\PemFixture;
use PHPUnit\Framework\TestCase;

class AsymmetricCipherTest extends TestCase
{
    public function testEncryptDecrypt()
    {
        $data = 'secret message';
        $privateKey = PemFixture::getPrivateKey();
        $publicKey = PemFixture::getPublicKey();

        $cipher = new AsymmetricCipher();

        $this->assertEquals($data, $cipher->decrypt($cipher->encrypt($data, $publicKey), $privateKey));
    }
}
