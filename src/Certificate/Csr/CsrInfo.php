<?php

namespace NiceCrypto\Certificate\Csr;

/**
 * Class CsrInfo
 *
 * @package NiceCrypto\Certificate\Csr
 */
class CsrInfo
{
    private $countryName;
    private $stateOrProvinceName;
    private $localityName;
    private $organizationName;
    private $organizationalUnitName;
    private $commonName;
    private $emailAddress;

    /**
     * @return array
     */
    public function toArray(): array
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

    /**
     * @param string $countryName
     *
     * @return $this
     */
    public function setCountryName(string $countryName)
    {
        $this->countryName = $countryName;
        return $this;
    }

    /**
     * @param string $stateOrProvinceName
     *
     * @return $this
     */
    public function setStateOrProvinceName(string $stateOrProvinceName)
    {
        $this->stateOrProvinceName = $stateOrProvinceName;
        return $this;
    }

    /**
     * @param string $localityName
     *
     * @return $this
     */
    public function setLocalityName(string $localityName)
    {
        $this->localityName = $localityName;
        return $this;
    }

    /**
     * @param string $organizationName
     *
     * @return $this
     */
    public function setOrganizationName(string $organizationName)
    {
        $this->organizationName = $organizationName;
        return $this;
    }

    /**
     * @param string $organizationalUnitName
     *
     * @return $this
     */
    public function setOrganizationalUnitName(string $organizationalUnitName)
    {
        $this->organizationalUnitName = $organizationalUnitName;
        return $this;
    }

    /**
     * @param string $commonName
     *
     * @return $this
     */
    public function setCommonName(string $commonName)
    {
        $this->commonName = $commonName;
        return $this;
    }

    /**
     * @param string $emailAddress
     *
     * @return $this
     */
    public function setEmailAddress(string $emailAddress)
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }
}
