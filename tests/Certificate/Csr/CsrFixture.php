<?php

namespace NiceCrypto\Tests\Certificate\Csr;

use NiceCrypto\Certificate\Csr\Csr;
use NiceCrypto\Certificate\Csr\CsrInfo;

class CsrFixture
{
    public static function getCsrInfo()
    {
        $dn = new CsrInfo();
        $dn->setCountryName('GB')
           ->setStateOrProvinceName('Somerset')
           ->setLocalityName('Glastonbury')
           ->setOrganizationName('The Brain Room Limited')
           ->setOrganizationalUnitName('PHP Documentation Team')
           ->setCommonName('Wez Furlong')
           ->setEmailAddress('wez@example.com');
        return $dn;
    }

    public static function getCsr()
    {
        return new Csr(CsrFixture::getCsrText());
    }

    public static function getCsrText()
    {
        return "-----BEGIN CERTIFICATE REQUEST-----
MIIB7zCCAVgCAQAwga4xCzAJBgNVBAYTAkdCMREwDwYDVQQIDAhTb21lcnNldDEU
MBIGA1UEBwwLR2xhc3RvbmJ1cnkxHzAdBgNVBAoMFlRoZSBCcmFpbiBSb29tIExp
bWl0ZWQxHzAdBgNVBAsMFlBIUCBEb2N1bWVudGF0aW9uIFRlYW0xFDASBgNVBAMM
C1dleiBGdXJsb25nMR4wHAYJKoZIhvcNAQkBFg93ZXpAZXhhbXBsZS5jb20wgZ8w
DQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBAORLkWZkaFYSSZ/6k9wGVHHhn0beZAIN
xT3e0g1gw+F/Qn5DVGSIxKBYuhR4fVvY574Pi88kufCpyJw+TeyOe9mHHqHfX95Z
T+GOFEr0Fk7cNwCtXeCASUD7KFUI34zzR34/H1ly09HE61aoRYhjFqgI/JOZiI2p
OhyVURlegbS1AgMBAAGgADANBgkqhkiG9w0BAQUFAAOBgQBrL0Hg9e/xxatRd/gr
8H8RpATSB2PNp7qFyALThqKT847+rSQcF6W15EbvllXdTTRcfHcY4+Ce+lv+wq21
t5tfAXAIeTtFoLaZZKnI6oRF/jv3dFLs1gNQlsHxFiDhARGQUQUyOcmCNyfsfwtJ
8qWdJT99CWES5+MSidTFu6invg==
-----END CERTIFICATE REQUEST-----
";
    }

}
