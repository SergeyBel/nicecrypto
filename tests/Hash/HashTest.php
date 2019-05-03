<?php

namespace NiceCrypto\Tests\Hash;

use NiceCrypto\Hash\Hash;
use NiceCrypto\Hash\HashAlgorithms;
use PHPUnit\Framework\TestCase;

class HashTest extends TestCase
{
    public function testSha256()
    {
        $h = new Hash(HashAlgorithms::SHA256);
        $text = 'The quick brown fox jumps over the lazy dog';
        $rightHash = 'd7a8fbb307d7809469ca9abcb0082e4f8d5651e46d3cdb762d02d0bf37c9e592';
        $this->assertEquals($rightHash, $h->hash($text));
    }
}
