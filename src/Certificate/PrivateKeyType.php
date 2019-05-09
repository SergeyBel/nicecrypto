<?php

namespace NiceCrypto\Certificate;

/**
 * Class PrivateKeyType
 *
 * @package NiceCrypto\Certificate
 */
class PrivateKeyType
{
    const KEYTYPE_DSA = OPENSSL_KEYTYPE_DSA;

    const KEYTYPE_DH = OPENSSL_KEYTYPE_DH;

    const KEYTYPE_RSA = OPENSSL_KEYTYPE_RSA;

    const KEYTYPE_EC = OPENSSL_KEYTYPE_EC;
}
