<?php

namespace NiceCrypto\Tests\Certificate\Csr;

use PHPUnit\Framework\TestCase;

class CsrTest extends TestCase
{
    public function testGetInfo()
    {
        $csr = CsrFixture::getCsr();
        $info = $csr->getInfo();
        $rightInfo = CsrFixture::getCsrInfo();
        $this->assertEquals($rightInfo->toArray(), $info->toArray());
    }

    public function testGetAsString()
    {
        $csr = CsrFixture::getCsr();
        $this->assertEquals(CsrFixture::getCsrText(), $csr->getAsString());

    }
}
