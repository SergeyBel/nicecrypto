<?php

namespace NiceCrypto\Tests\Certificate;

use NiceCrypto\Certificate\GenerateOptions;
use NiceCrypto\Certificate\PrivateKeyType;
use NiceCrypto\Hash\HashAlgorithm;
use PHPUnit\Framework\TestCase;

class GenerateOptionsTest extends TestCase
{
    public function testDigestAlgo()
    {
        $algo = HashAlgorithm::SHA256;
        $opts = new GenerateOptions();
        $opts->setDigestAlgo($algo);
        $this->assertEquals($opts->toArray(), ['digest_alg' => $algo]);
    }

    public function testPrivateKeyBits()
    {
        $bits = 2048;
        $opts = new GenerateOptions();
        $opts->setBits($bits);
        $this->assertEquals($opts->toArray(), ['private_key_bits' => $bits]);
    }

    public function testKeyType()
    {
        $type = PrivateKeyType::KEYTYPE_DSA;
        $opts = new GenerateOptions();
        $opts->setType($type);
        $this->assertEquals($opts->toArray(), ['private_key_type' => $type]);
    }
}
