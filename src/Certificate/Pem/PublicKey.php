<?php

namespace NiceCrypto\Certificate\Pem;

use NiceCrypto\Certificate\PublicKeyInterface;

class PublicKey implements PublicKeyInterface
{
    private $resource;
    private $text;

    public function __construct(string $text)
    {
    }

}
