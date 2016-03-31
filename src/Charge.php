<?php

namespace Iugu;

use Iugu\Util\Request;

class Charge extends Request
{
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function create($data)
    {
        $req = $this->postRequest('charge', $data, $this->apiKey);
        return $req;
    }
}
