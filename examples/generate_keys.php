<?php
require_once '../vendor/autoload.php';

use NiceCrypto\Certificate\Pem\PemGenerator;

$generator = new  PemGenerator();
$privateKey = $generator->generatePrivateKey();
$publicKey = $generator->generatePublicKey($privateKey);
file_put_contents('private.pem', $privateKey->toString());
file_put_contents('public.pem', $publicKey->toString());
