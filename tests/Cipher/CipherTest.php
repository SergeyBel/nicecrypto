<?php

namespace NiceCrypto\Tests\Cipher;

use NiceCrypto\Cipher\Cipher;
use NiceCrypto\Cipher\CipherAlgotithms;
use NiceCrypto\Cipher\CipherModes;
use PHPUnit\Framework\TestCase;

class CipherTest extends TestCase
{
    public function testEncryptDecrypt()
    {
        $data = 'new message';
        $key = 'ffffffffffffffffffffffffffffffff';
        $iv =  'ffffffffffffffffffffffffffffffff';
        $c = new Cipher(CipherAlgotithms::AES256, CipherModes::CBC);
        $this->assertEquals($data, $c->decrypt($c->encrypt($data, $key, $iv), $key, $iv));
    }
}
