<?php

namespace Iugu;

use Iugu\Util\Request;

class SubAccount extends Request
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param $data
     * @return stdClass
     */
    public function create($data)
    {
        $req = $this->postRequest('marketplace/create_account', $data, $this->apiKey);
        return $req;
    }
}
