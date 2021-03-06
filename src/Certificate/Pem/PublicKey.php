<?php

namespace NiceCrypto\Certificate\Pem;

use NiceCrypto\Certificate\PublicKeyInterface;
use NiceCrypto\Exception\PemException;

/**
 * Class PublicKey
 *
 * @package NiceCrypto\Certificate\Pem
 */
class PublicKey implements PublicKeyInterface
{
    private $resource;
    private $text;

    public function __construct(string $text)
    {
        $this->resource = openssl_pkey_get_public($text);
        if ($this->resource === false) {
            throw new PemException();
        }
        $this->text = $text;
    }

    /**
     * @return resource
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @return string
     */
    public function getAsString(): string
    {
        return $this->text;
    }
}
