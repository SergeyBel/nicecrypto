# NiceCrypto
NiceCrypto is a simple and powerful crypto library written in  php based on openssl extension

# Installation
`composer require sergey-bel/nicecrypto`
# Keys
Use `PrivateKey` and `PublicKey` classes to work with keys pairs;
```php
$yourPrivateKey = '-----BEGIN ENCRYPTED PRIVATE KEY...';
$passphrase = 'your secret password';
$privateKey = new PrivateKey($yourPrivateKey, $passphrase);
```

```php
$yourPublicKey = '-----BEGIN PUBLIC KEY...';
$publicKey = new PublicKey($yourPublicKey);
```

To generate pem keys use `PemGenerator`
```php
// generate private and public keys and save in files
$generator = new  PemGenerator();
$privateKey = $generator->generatePrivateKey();
$publicKey = $generator->generatePublicKey($privateKey);
file_put_contents('private.pem', $privateKey->toString());
file_put_contents('public.pem', $publicKey->toString());
```

If you need use options (passphrase, bits length, etc) use `GenerateOptions` class
```php
// generate key pair 2048 bit length and encrypted with passphrase
$bitsLength = 2048;
$passphrase = 'password';
$options = new GenerateOptions();
$options->setBits($bitsLength)->setPassphrase($passphrase);
$generator = new PemGenerator();

$privateKey = $generator->generatePrivateKey($options);
$publicKey = $generator->generatePublicKey($privateKey);
```
# Ciphers

`Cipher` class is used for symmetric encryption\decryption (AES for example)

```php
$key = 'ffffffffffffffffffffffffffffffff';
$iv =  'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee';
$m = 'some string';
$c = '596864655a4f71315a357164353045734566676d35513d3d';
$cipher = new Cipher(CipherAlgotithms::AES256, CipherModes::CBC);
$c = $cipher->encrypt($m, $key, $iv);
$message = $cipher->decrypt($c, $key, $iv); // 'some string'
```
You can generate key and iv by RandomGenerator
```php
$generator = new RandomGenerator();
$cipher = new Cipher(CipherAlgotithms::AES256, CipherModes::CBC);
$key = $generator->generateRandomBytes(32); //256 bits key
$iv = $generator->generateRandomBytes($cipher->getIvBytesLength());
// encrypt\decrypt using key and iv

```
# Hash

`Hash` class is used for calculate cryptographic hash functions 
```php
$hash = new Hash(HashAlgorithms::SHA256);
$text = 'The quick brown fox jumps over the lazy dog';
$h = $h->hash($text); //'d7a8fbb307d7809469ca9abcb0082e4f8d5651e46d3cdb762d02d0bf37c9e592'
```

# Signature

`Signature` is used for sign and verify cryptographic signatures

```php
$privateKey = new PrivateKey('your private key');
$s = new Signature(new Hash(HashAlgorithms::SHA256));
$signature =  $s->sign($data, $privateKey);
$publicKey = new PublicKey('your public key');
$result = $signature->verify($data, $signature, $publicKey); //true
```