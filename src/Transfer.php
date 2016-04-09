<?php

namespace Iugu;

use Iugu\Util\Request;

class Transfer extends Request
{
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        parent::__construct();
    }

    public function create(array $data)
    {
        $req = $this->postRequest('transfers', $data, $this->apiKey);

        return $req;
    }
}
