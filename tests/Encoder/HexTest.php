<?php

namespace NiceCrypto\Tests\Encoder;

use NiceCrypto\Encoder\Hex;
use NiceCrypto\Exception\EncodeException;
use PHPUnit\Framework\TestCase;

class HexTest extends TestCase
{
    public function testEncode()
    {
        $data = '1234';
        $enc = new Hex();
        $this->assertEquals('31323334', $enc->encode($data));
    }

    public function testDecode()
    {
        $data = '31323334';
        $enc = new Hex();
        $this->assertEquals('1234', $enc->decode($data));
    }

    public function testDecodeIncorrect()
    {
        $data = 'not hex';
        $enc = new Hex();
        $this->expectException(EncodeException::class);
        $enc->decode($data);
    }
}
