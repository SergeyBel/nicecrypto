<?php

namespace NiceCrypto\Certificate\X509;

use NiceCrypto\Certificate\PublicKeyInterface;
use NiceCrypto\Exception\X509Exception;

/**
 * Class X509
 *
 * @package NiceCrypto\Certificate\X509
 */
class X509 implements PublicKeyInterface
{
    private $text;

    private $resource;

    public function __construct(string $text)
    {
        $this->resource = openssl_x509_read($text);
        if ($this->resource === false) {
            throw new X509Exception();
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
     * @throws \NiceCrypto\Exception\X509Exception
     */
    public function getAsString(): string
    {
        if (openssl_x509_export($this->resource, $text) === false) {
            throw new X509Exception();
        }

        return $text;
    }

    public function __destruct()
    {
        if ($this->resource !== null) {
            openssl_x509_free($this->resource);
        }
    }
}
