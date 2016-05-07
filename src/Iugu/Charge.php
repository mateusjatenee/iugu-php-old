<?php

namespace Mateusjatenee\Iugu;

use Mateusjatenee\Iugu\Util\Request;

class Charge
{
    /**
     * @var string
     */
    private $apiKey;
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
     * @param array $data
     *
     * @return stdClass
     */
    public function create($data)
    {
        $req = $this->request->post('charge', $data, $this->apiKey);

        return $req;
    }
}
