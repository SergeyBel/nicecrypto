<?php

namespace NiceCrypto\Certificate;

class GenerateOptions
{
    private $digestAlgo = 'default';
    private $bits = 2048;
    private $reqExtension = 'v3_req';
    private $x509Extension = 'v3_ca';
    private $type = PrivateKeyTypes::KEYTYPE_RSA;
    private $data;

    public function toArray()
    {
        $this->data = [];
        $this->addElement('digest_alg', $this->digestAlgo);
        $this->addElement('private_key_bits', $this->bits);
        $this->addElement('private_key_type', $this->type);
        $this->addElement('req_extensions', $this->reqExtension);
        $this->addElement('x509_extensions', $this->x509Extension);
        return $this->data;
    }

    private function addElement(string $name, $value)
    {
        if ($value !== null) {
            $this->data[$name] = $value;
        }
    }

    public function setDigestAlgo(string $digestAlgo)
    {
        $this->digestAlgo = $digestAlgo;
        return $this;
    }

    public function setBits(int $bits)
    {
        $this->bits = $bits;
        return $this;
    }

    public function setType(int $type)
    {
        $this->type = $type;
        return $this;
    }
}

