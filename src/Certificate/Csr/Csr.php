<?php

namespace NiceCrypto\Certificate\Csr;

use NiceCrypto\Exception\CsrException;

class Csr
{
    private $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function getAsString(): string
    {
        return $this->text;
    }

    public function getInfo(): CsrInfo
    {
        $data = openssl_csr_get_subject($this->text);
        if ($data === false) {
            throw new CsrException();
        }
        $info = new CsrInfo();
        $info->setCountryName($data['C'])
             ->setStateOrProvinceName($data['ST'])
             ->setLocalityName($data['L'])
             ->setOrganizationName($data['O'])
             ->setOrganizationalUnitName($data['OU'])
             ->setCommonName($data['CN'])
             ->setEmailAddress($data['emailAddress']);
        return $info;
    }
}
