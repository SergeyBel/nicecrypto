<?php

namespace NiceCrypto\Encoder;

interface EncoderInterface
{
    public function encode(string $cleanStr): string;

    public function decode(string $encodedStr): string;
}
