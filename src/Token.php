<?php

namespace Iugu;

use Iugu\Util\Request;

class Token extends Request
{

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function create(array $data)
    {
        $req = $this->postRequest('payment_token', $data);
        return $req;
    }
}
