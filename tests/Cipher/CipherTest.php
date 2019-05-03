<?php

namespace NiceCrypto\Tests\Cipher;

use NiceCrypto\Cipher\Cipher;
use NiceCrypto\Cipher\CipherAlgotithms;
use NiceCrypto\Cipher\CipherModes;
use PHPUnit\Framework\TestCase;

class CipherTest extends TestCase
{
    public function testEncrypt()
    {
        $key = 'ffffffffffffffffffffffffffffffff';
        $iv =  'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee';
        $m = 'some string';
        $c = '596864655a4f71315a357164353045734566676d35513d3d';
        $cipher = new Cipher(CipherAlgotithms::AES256, CipherModes::CBC);
        $this->assertEquals($c, $cipher->encrypt($m, $key, $iv));
    }

    public function testDecrypt()
    {
        $key = 'ffffffffffffffffffffffffffffffff';
        $iv =  'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee';
        $m = 'some string';
        $c = '596864655a4f71315a357164353045734566676d35513d3d';
        $cipher = new Cipher(CipherAlgotithms::AES256, CipherModes::CBC);
        $this->assertEquals($m, $cipher->decrypt($c, $key, $iv));
    }


    public function testEncryptDecrypt()
    {
        $data = 'new message';
        $key = 'ffffffffffffffffffffffffffffffff';
        $iv =  'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee';
        $c = new Cipher(CipherAlgotithms::AES256, CipherModes::CBC);
        $this->assertEquals($data, $c->decrypt($c->encrypt($data, $key, $iv), $key, $iv));
    }

    public function testGetIvLength()
    {
        $cipher = new Cipher(CipherAlgotithms::AES256, CipherModes::CBC);
        $this->assertEquals(16, $cipher->getIvBytesLength());
    }
}
