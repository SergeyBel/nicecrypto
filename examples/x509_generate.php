<?php

use NiceCrypto\Certificate\Csr\CsrGenerator;
use NiceCrypto\Certificate\Csr\CsrInfo;
use NiceCrypto\Certificate\Pem\PemGenerator;
use \NiceCrypto\Certificate\X509\X509Generator;

require_once '../vendor/autoload.php';

$dn = new CsrInfo();
$dn->setCountryName('GB')
   ->setStateOrProvinceName('Somerset')
   ->setLocalityName('Glastonbury')
   ->setOrganizationName('The Brain Room Limited')
   ->setOrganizationalUnitName('PHP Documentation Team')
   ->setCommonName('Wez Furlong')
   ->setEmailAddress('wez@example.com');

$privateKey = (new PemGenerator())->generatePrivateKey();
file_put_contents('priv.pem', $privateKey->getAsString());
$gen = new CsrGenerator();
$csr = $gen->generateCsr($dn, $privateKey);
file_put_contents('req.csr', $csr->getAsString());
$x509Generator = new X509Generator();
$x509 = $x509Generator->generateX509($csr, $privateKey);
file_put_contents('x509.cert', $x509->getAsString());