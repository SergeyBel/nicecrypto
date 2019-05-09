<?php


namespace NiceCrypto\Certificate;

/**
 * Interface KeyInterface
 *
 * @package NiceCrypto\Certificate
 */
interface KeyInterface
{
    /**
     * @return mixed
     */
    public function getResource();

    /**
     * @return string
     */
    public function getAsString(): string;
}
