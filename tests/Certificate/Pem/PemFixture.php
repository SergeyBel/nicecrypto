<?php

namespace NiceCrypto\Tests\Certificate\Pem;

use NiceCrypto\Certificate\Pem\PrivateKey;
use NiceCrypto\Certificate\Pem\PublicKey;

class PemFixture
{
    public static function getPrivateKey()
    {
        return new PrivateKey('-----BEGIN PRIVATE KEY-----
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
-----END PRIVATE KEY-----');
    }

    public static function getPublicKey()
    {
        return new PublicKey('-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDkS5FmZGhWEkmf+pPcBlRx4Z9G
3mQCDcU93tINYMPhf0J+Q1RkiMSgWLoUeH1b2Oe+D4vPJLnwqcicPk3sjnvZhx6h
31/eWU/hjhRK9BZO3DcArV3ggElA+yhVCN+M80d+Px9ZctPRxOtWqEWIYxaoCPyT
mYiNqToclVEZXoG0tQIDAQAB
-----END PUBLIC KEY-----');
    }

}