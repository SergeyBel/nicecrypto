<?php

namespace NiceCrypto\Certificate\Csr;

class CsrInfo
{
    private $countryName;
    private $stateOrProvinceName;
    private $localityName;
    private $organizationName;
    private $organizationalUnitName;
    private $commonName;
    private $emailAddress;

    public function toArray()
    {
        return [
            'countryName' => $this->countryName,
            'stateOrProvinceName' => $this->stateOrProvinceName,
            'localityName' => $this->localityName,
            'organizationName' => $this->organizationName,
            'organizationalUnitName' => $this->organizationalUnitName,
            'commonName' => $this->commonName,
            'emailAddress' => $this->emailAddress
        ];
    }

    public function setCountryName(string $countryName)
    {
        $this->countryName = $countryName;
        return $this;
    }

    public function setStateOrProvinceName(string $stateOrProvinceName)
    {
        $this->stateOrProvinceName = $stateOrProvinceName;
        return $this;
    }

    public function setLocalityName(string $localityName)
    {
        $this->localityName = $localityName;
        return $this;
    }

    public function setOrganizationName(string $organizationName)
    {
        $this->organizationName = $organizationName;
        return $this;
    }

    public function setOrganizationalUnitName(string $organizationalUnitName)
    {
        $this->organizationalUnitName = $organizationalUnitName;
        return $this;
    }

    public function setCommonName(string $commonName)
    {
        $this->commonName = $commonName;
        return $this;
    }

    public function setEmailAddress(string $emailAddress)
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }
}
