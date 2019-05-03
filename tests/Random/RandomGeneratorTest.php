<?php

namespace NiceCrypto\Tests\Cipher;

use NiceCrypto\Encoder\Hex;
use NiceCrypto\Random\RamdomBytesGenerator;
use PHPUnit\Framework\TestCase;

class RandomGeneratorTest extends TestCase
{
    public function testKeyGenerate()
    {
        $bytesLength = 128;
        $g = new RamdomBytesGenerator();
        $g->setEncoder(new Hex());
        $key = $g->generateRandomBytes($bytesLength);
        $this->assertEquals(256, strlen($key));
    }
}
