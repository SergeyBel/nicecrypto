<?php

namespace NiceCrypto\Certificate;

class GenerateOptions
{
    private $digestAlgo;
    private $bits;
    private $type;
    private $passphrase;
    private $data;

    public function toArray()
    {
        $this->data = [];
        $this->addElement('digest_alg', $this->digestAlgo);
        $this->addElement('private_key_bits', $this->bits);
        $this->addElement('private_key_type', $this->type);
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
    public function getPassphrase(): ?string
    {
        return $this->passphrase;
    }

    public function setPassphrase(string $passphrase)
    {
        $this->passphrase = $passphrase;
        return $this;
    }
}
