<?php

namespace NiceCrypto\Certificate\Pem;

use NiceCrypto\Certificate\KeyInterface;
use NiceCrypto\Exception\PemException;

/**
 * Class PrivateKey
 *
 * @package NiceCrypto\Certificate\Pem
 */
class PrivateKey implements KeyInterface
{
    private $resource;
    private $type;
    private $bits;
    private $text;

    public function __construct(string $text, string $passphrase = null)
    {
        if ($passphrase !== null) {
            $this->resource = openssl_pkey_get_private($text, $passphrase);
        } else {
            $this->resource = openssl_pkey_get_private($text);
        }

        if ($this->resource === false) {
            throw new PemException();
        }
        $this->text = $text;
        $keyData = openssl_pkey_get_details($this->resource);
        if ($keyData === false) {
            throw new PemException();
        }
        $this->bits = $keyData['bits'];
        $this->type = $keyData['type'];
    }

    /**
     * @return string
     */
    public function getAsString(): string
    {
        return $this->text;
    }

    /**
     * @return resource
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getBits(): int
    {
        return $this->bits;
    }

    public function __destruct()
    {
        if ($this->resource !== null) {
            openssl_free_key($this->resource);
        }
    }
}
