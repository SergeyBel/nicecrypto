<?php

namespace NiceCrypto\Certificate\Pem;

class PrivateKey
{
    private $resource;
    private $type;
    private $bits;
    private $text;

    public function __construct(string $text, string $key = null)
    {
    }

}
