<?php
require_once '../vendor/autoload.php';

use \NiceCrypto\Certificate\GenerateOptions;
use \NiceCrypto\Certificate\Pem\PemGenerator;


$bitsLength = 2048;
$passphrase = 'password';
$options = new GenerateOptions();
$options->setBits($bitsLength)->setPassphrase($passphrase);
$generator = new PemGenerator();

$privateKey = $generator->generatePrivateKey($options);
$publicKey = $generator->generatePublicKey($privateKey);
file_put_contents('private.pem', $privateKey->toString());
file_put_contents('public.pem', $publicKey->toString());