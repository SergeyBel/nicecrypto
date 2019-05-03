<?php

namespace NiceCrypto\Tests\Certificate\Pem;

use NiceCrypto\Certificate\Pem\PemGenerator;
use NiceCrypto\Certificate\Pem\PrivateKey;
use NiceCrypto\Certificate\Pem\PublicKey;

class PemFixture
{
    const BITS = 1024;
    const TYPE = OPENSSL_KEYTYPE_RSA;
    const PASSPHRASE = '123456';
    public static function getBits()
    {
        return 1024;
    }
    public static function getPrivateKey()
    {
        return new PrivateKey(PemFixture::getPrivateKeyText());
    }

    public static function getPrivateKeyText()
    {
        return '-----BEGIN PRIVATE KEY-----
MIICeAIBADANBgkqhkiG9w0BAQEFAASCAmIwggJeAgEAAoGBAORLkWZkaFYSSZ/6
k9wGVHHhn0beZAINxT3e0g1gw+F/Qn5DVGSIxKBYuhR4fVvY574Pi88kufCpyJw+
TeyOe9mHHqHfX95ZT+GOFEr0Fk7cNwCtXeCASUD7KFUI34zzR34/H1ly09HE61ao
RYhjFqgI/JOZiI2pOhyVURlegbS1AgMBAAECgYEAutMcqi6BM+7DUag+WFDVylxZ
fCWCsiuSvo8aVthZdLAwOiPfbGaAgrgZj6cK758SBvex8lKb19cZ1MMoAe6Yal+N
vQEQKXJ3VWYE9f/rQA/9FqO4zZzkff0QFTrm1Yh6kpKXmeUUCAFVki965FW9OgH9
Ss7tLkcyTmP+N+c44AECQQD9RUzlLuPgS8BcjtmCdVdNb1PypsNMUodhT8kmf8ov
5L5i0H3KSAf8E+cpfgPej1lJiDH5cuv/KWd+O5xLmAHRAkEA5sFeEkMa14+zYffe
LLwn2QcIODKaC2Zn4AqPMTWGWyMUHN7WLOi/S8FY3WsqUag5rEAU46LH5+yOfflA
GlE5pQJADiXp5r+Y0TXKGCGOuv/tEZFPgjWYoVHW6DO5y+HFnKlNjV2SOVOOxqEh
/6pfcvZVCYuHJyUpU8avVljkIUDrkQJBAN/lfYZQsCm6F76WB2/2fN96kEIe7xLi
oSVkeX2wxpWFWs2MddmLV5mEl9n3Uk9638K/RsV8u2TQRY37m3QtnbUCQQCUFtwf
IhyooJmSq7YqxUiBJl911NY57GCGN3PXRR+yZGrNFnLRHSbk/ZPlpEdqHbH9y4CH
ltIgMeKu5Dj5i3mb
-----END PRIVATE KEY-----';
    }

    public static function getEncryptedPrivateKeyText()
    {
        return '-----BEGIN ENCRYPTED PRIVATE KEY-----
MIIFHDBOBgkqhkiG9w0BBQ0wQTApBgkqhkiG9w0BBQwwHAQITDFleIDAiO0CAggA
MAwGCCqGSIb3DQIJBQAwFAYIKoZIhvcNAwcECCuWMnIxFbqLBIIEyLZFTOT7P/QE
HY9/W8tK++9wUauG9in3LcFNbKJ2czCpT4aT5VoOHk+CmgeIMFEGQN0vERPEHvo1
OtN6hKC8Kbe/9E9qnlpIQ+YfrawZMgQIhJFbig7J/DAViPOHjXsEr4CmXrGnIoNK
P1BlihoVW+o/fCGTg6H1Ntqh5S7qLoBygyJvGBhfxXn3ALt4fXznlyJ0OePGkO8E
dYQ3x35AGpm/KEufFQmuXYRJq3SnETC7YYVuXQeDV5vPegxZB8yf+L3xT2pXiN4U
EjWW29kzI4+KbqQjnmKpkKWroPMbEpancPEqYBDvDsilJ5inigCfjj92rXivfJSD
xv83lWhus+VVyjSKS3d8qX/EwqWrDB2HYJCRfNXampC4hWoKbrTSVq7iG0IkMp6v
E7ptADQIZ7viV5cEXOWvXyfnCin0ekIehmoj1MdbToqouwKQIIzE14pxTYSW6t8l
M9cPLp7xv7rXoM3O2Q8RUsmxvHH/bAcw61tSzzhjlJwAigknTLHFzlM+klTWl55g
cLmMSIIh5vHFtpPg2S/IrSLb2hQwAi/ttYuJ1AP8pr44De6ZcweKHilmy01n0XIw
nYYfN587Txyl6zwjcNZ3I8oKAGYx6naSVYO4cUiyKMQyh/TFTLRz98kLub7M8Sr3
La7OuvSo4DPbA13PhpYH2T2vr3Ejaf4Qx6vqyhh8fbnBigNaJRGsqI8OqV/Uty5r
TslMOn/UDOFC8jMdApyP8UaZN2qI8HyLQw9Nip/L9vCqM9MmK4ixhubbFOvYxpOj
kSEaXCByh2YwKfhHQhH2X4czx8+ZYHxt7MKrjbZHnH2GIurDLb6FQSFttRLr06Dm
6ufStbgg8sGSnoF9OiXVDV4nM4r/Woi+RJ+FcfDszE5LqpUj+o06MSBIMv4Ft/Y5
87nzBWMR2SC7BwKI6QAJS33I3CXE9LshftCj8LDM2TXwnkfopoqaDSf8Qq5Tp4pp
QAvGCgcTTsVDzIsA6rhR9zH/ShjzzWcdD1CyWXd/MakZneuWnATIOYb7gDn3OKsz
p6xvDSYkCnp7d/H25Q8oLTpfKbWjONrmv0ROfWrmDQ1fNAvphIj5+1+NUt/QJ08a
ZEUYZuIKV6W3/MfzfRYKSlaOrhDlN/AYILPgJbKQe6tq99amos51tcmW7weO1iHi
xseuiYmXPMq0319wkVlOUoaPkFB6wZT3z+pjL0xA58rADbWmyw51B1WCCshAlEx7
gL/3I5lRgXUcCaE8JD/yrfPyQIqjhsZueYMV8wdS0+N0CDPznIYNDzVba7bVVfSP
ltmAOtI2dS9UPkXOkatsLbQvXiwWItgKQ+6KbwYhaYJplk/OaH5Q6PT6YEGhh20f
Tm5JKXCA8l8xryAqPLMfYcKSimpNPbyoqfR8OERxvMzRWbojv+dwyw1uBYA2+3r+
2y0r2U1U6R2zQwadOlGmHQ7pVjoTiG8A+bjI2rmfFlr5S/08Cc5+6pZbzPojeq93
q2rcF03W2WqTBM3+9lk5apSzSjNi2eTRx3OLPoPsFQqKl7HOTM08/3pH6pcQ1bFv
tNy/ME7alduIdR6EzXGLkVwhfEUXySulioI3KUb87ZC15Bv8oNM5pR/gIe5Kr3JO
eWlnvv2ZE2muiFA/K/k5EA==
-----END ENCRYPTED PRIVATE KEY-----';
    }


    public static function getPublicKey()
    {
        return new PublicKey(PemFixture::getPublicKeyText());
    }

    public static function getPublicKeyText()
    {
        return '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDkS5FmZGhWEkmf+pPcBlRx4Z9G
3mQCDcU93tINYMPhf0J+Q1RkiMSgWLoUeH1b2Oe+D4vPJLnwqcicPk3sjnvZhx6h
31/eWU/hjhRK9BZO3DcArV3ggElA+yhVCN+M80d+Px9ZctPRxOtWqEWIYxaoCPyT
mYiNqToclVEZXoG0tQIDAQAB
-----END PUBLIC KEY-----';
    }

}
