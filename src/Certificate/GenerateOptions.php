<?php

namespace NiceCrypto\Certificate;

/**
 * Class GenerateOptions
 *
 * @package NiceCrypto\Certificate
 */
class GenerateOptions
{
    private $digestAlgo;

    private $bits;

    private $type;

    private $passphrase;

    private $data;

    /**
     * @return array
     */
    public function toArray(): array
    {
        $this->data = [];
        $this->addElement('digest_alg', $this->digestAlgo);
        $this->addElement('private_key_bits', $this->bits);
        $this->addElement('private_key_type', $this->type);
        return $this->data;
    }

    /**
     * @param string $name
     * @param        $value
     */
    private function addElement(string $name, $value)
    {
        if ($value !== null) {
            $this->data[$name] = $value;
        }
    }

    /**
     * @param string $digestAlgo
     *
     * @return $this
     */
    public function setDigestAlgo(string $digestAlgo)
    {
        $this->digestAlgo = $digestAlgo;
        return $this;
    }

    /**
     * @param int $bits
     *
     * @return $this
     */
    public function setBits(int $bits)
    {
        $this->bits = $bits;
        return $this;
    }

    /**
     * @param int $type
     *
     * @return $this
     */
    public function setType(int $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassphrase(): ?string
    {
        return $this->passphrase;
    }

    /**
     * @param string $passphrase
     *
     * @return $this
     */
    public function setPassphrase(string $passphrase)
    {
        $this->passphrase = $passphrase;
        return $this;
    }
}
