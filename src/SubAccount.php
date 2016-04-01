<?php

namespace Iugu;

use Iugu\Util\Request;

class SubAccount extends Request
{
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function create($data)
    {
        $req = $this->postRequest('marketplace/create_account', $data, $this->apiKey);
        return $req;
    }
}
