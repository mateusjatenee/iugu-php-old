<?php

namespace Mateusjatenee\Iugu;

use Mateusjatenee\Iugu\Util\Request;

class SubAccount
{
    /**
     * @var string
     */
    private $apiKey;
    /**
     * @var mixed
     */
    private $request;

    /**
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->request = new Request;
    }

    /**
     * @param $data
     *
     * @return stdClass
     */
    public function create($data)
    {
        $req = $this->request->post('marketplace/create_account', $data, $this->apiKey);

        return $req;
    }
}
