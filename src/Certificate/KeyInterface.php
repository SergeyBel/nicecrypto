<?php


namespace NiceCrypto\Certificate;


interface KeyInterface
{
    public function getResource();
    public function toString();
    public function saveToFile(string $filepath);
}