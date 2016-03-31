<?php

namespace Iugu;

class Token
{

    public function __construct($apiKey)
    {
        $this->$apiKey = $apiKey;
    }

    public function create($data)
    {
        $req = $this->postRequest('payment_token', $data);
        return $req;
    }
}
