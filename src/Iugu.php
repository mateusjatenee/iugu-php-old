<?php

namespace Iugu;

class Iugu
{
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function token()
    {
        return new Token($this->apiKey);
    }
}
