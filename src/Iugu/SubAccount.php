<?php

namespace Mateusjatenee\Iugu;

use Mateusjatenee\Iugu\Util\Request;

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
        parent::__construct();
    }

    /**
     * @param $data
     *
     * @return stdClass
     */
    public function create($data)
    {
        $req = $this->post('marketplace/create_account', $data, $this->apiKey);

        return $req;
    }
}
