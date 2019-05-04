<?php

namespace NiceCrypto\Tests\Certificate\Csr;

use NiceCrypto\Certificate\Csr\CsrInfo;
use PHPUnit\Framework\TestCase;

class CsrInfoTest extends TestCase
{
    public function testToArray()
    {
        $info = new CsrInfo();
        $info->setCountryName('GB')
             ->setStateOrProvinceName('Somerset')
             ->setLocalityName('Glastonbury')
             ->setOrganizationName('The Brain Room Limited')
             ->setOrganizationalUnitName('PHP Documentation Team')
             ->setCommonName('Wez Furlong')
             ->setEmailAddress('wez@example.com');
        $dn = [
            'countryName' => 'GB',
            'stateOrProvinceName' => 'Somerset',
            'localityName' => 'Glastonbury',
            'organizationName' => 'The Brain Room Limited',
            'organizationalUnitName' => 'PHP Documentation Team',
            'commonName' => 'Wez Furlong',
            'emailAddress' => 'wez@example.com'
        ];
        $this->assertEquals($dn, $info->toArray());
    }

}
