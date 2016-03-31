<?php

namespace Iugu;

use Iugu\Util\Request;

class Customer extends Request
{
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function create(array $data)
    {
        $req = $this->postRequest('customers', $data, $this->apiKey);
        return $req;
    }

}
