<?php

namespace NiceCrypto\Tests\Cipher;

use NiceCrypto\Encoder\Hex;
use NiceCrypto\Random\RandomBytesGenerator;
use PHPUnit\Framework\TestCase;

class RandomGeneratorTest extends TestCase
{
    public function testKeyGenerate()
    {
        $bytesLength = 128;
        $g = new RandomBytesGenerator();
        $g->setEncoder(new Hex());
        $key = $g->generateRandomBytes($bytesLength);
        $this->assertEquals(256, strlen($key));
    }
}
