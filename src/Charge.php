<?php

namespace Iugu;

use Iugu\Util\Request;

class Charge extends Request
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
        parent::__construct();
    }

    /**
     * @param array $data
     * @return stdClass
     */
    public function create($data)
    {
        $req = $this->postRequest('charge', $data, $this->apiKey);
        return $req;
    }
}
