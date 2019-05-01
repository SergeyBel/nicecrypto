<?php

namespace NiceCrypto\Tests\Cipher;

use NiceCrypto\Random\RamdomBytesGenerator;
use PHPUnit\Framework\TestCase;

class RandomGeneratorTest extends TestCase
{
    public function testKeyGenerate()
    {
        $bytesLength = 128;
        $g = new RamdomBytesGenerator();
        $key = $g->generateRandomBytes($bytesLength);
        $this->assertEquals(256, strlen($key));
    }
}
