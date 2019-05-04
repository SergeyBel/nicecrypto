<?php

use NiceCrypto\Certificate\Csr\CsrGenerator;
use NiceCrypto\Certificate\Csr\CsrInfo;
use NiceCrypto\Certificate\Pem\PemGenerator;

require_once '../vendor/autoload.php';

$dn = new CsrInfo();
$dn->setCountryName("GB")
   ->setStateOrProvinceName("Somerset")
   ->setLocalityName("Glastonbury")
   ->setOrganizationName("The Brain Room Limited")
   ->setOrganizationalUnitName("PHP Documentation Team")
   ->setCommonName("Wez Furlong")
   ->setEmailAddress("wez@example.com");

$privateKey = (new PemGenerator())->generatePrivateKey();
$gen = new CsrGenerator();
$csr = $gen->generateCsr($dn, $privateKey);
file_put_contents('req.csr', $csr->getAsString());
