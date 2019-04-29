<?php

namespace NiceCrypto\Certificate\Generator;

class GenerateOptions
{
    private $digestAlgo;
    private $bits;
    private $type;
    private $data;

    public function toArray()
    {
        $this->data = [];
        $this->addElement('digest_alg', $this->digestAlgo);
        $this->addElement('private_key_bits', $this->bits);
        $this->addElement('private_key_type', $this->type);
        return $this->data;
    }

    private function addElement(string $name, string $value)
    {
        if ($value !== null) {
            $this->data[$name] = $value;
        }
    }
}

