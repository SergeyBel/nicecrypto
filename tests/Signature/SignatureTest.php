<?php

namespace NiceCrypto\Tests\Signature;

use NiceCrypto\Hash\Hash;
use NiceCrypto\Hash\HashAlgorithm;
use NiceCrypto\Signature\Signature;
use NiceCrypto\Tests\Certificate\Pem\PemFixture;
use PHPUnit\Framework\TestCase;

class SignatureTest extends TestCase
{
    public function testSign()
    {
        $data = '12345';
        $privateKey = PemFixture::getPrivateKey();
        $s = new Signature(new Hash(HashAlgorithm::SHA256));
        $signature =  $s->sign($data, $privateKey);
        $rightSignature = '32084b74d348905100af8b7666dc8d2febc8a7d92098497e50ac15e078996d8001e407836709a33bb124042af857e1cb9a14d65a1cd7a68434fab20c4129d0a1691fa900e42b9883a53c8c6d5fe9aea7c2981d933cffa8855bc5d99cd5751f45ade424c5c7cac68df70e6d99e8f863e0a50d37185dd1c38f4e234f801172f79e';
        $this->assertEquals($rightSignature, $signature);
    }

    public function testVerifyTrue()
    {
        $data = '12345';
        $publicKey = PemFixture::getPublicKey();
        $s = new Signature(new Hash(HashAlgorithm::SHA256));
        $signature = '32084b74d348905100af8b7666dc8d2febc8a7d92098497e50ac15e078996d8001e407836709a33bb124042af857e1cb9a14d65a1cd7a68434fab20c4129d0a1691fa900e42b9883a53c8c6d5fe9aea7c2981d933cffa8855bc5d99cd5751f45ade424c5c7cac68df70e6d99e8f863e0a50d37185dd1c38f4e234f801172f79e';
        $this->assertTrue($s->verify($data, $signature, $publicKey));
    }

    public function testVerifyFalse()
    {
        $data = '12345';
        $publicKey = PemFixture::getPublicKey();
        $s = new Signature(new Hash(HashAlgorithm::SHA256));
        $signature = 'ffff';
        $this->assertFalse($s->verify($data, $signature, $publicKey));
    }

    public function testSignVerify()
    {
        $data = 'New data';
        $privateKey = PemFixture::getPrivateKey();
        $publicKey = PemFixture::getPublicKey();
        $s = new Signature(new Hash(HashAlgorithm::SHA256));
        $this->assertTrue($s->verify($data, $s->sign($data, $privateKey), $publicKey));
    }
}
