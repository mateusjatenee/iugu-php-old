<?php

namespace Mateusjatenee\Iugu;

use Mateusjatenee\Iugu\Util\Request;

class Transfer
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
     * @param array $data
     *
     * @return \stdClass
     */
    public function create(array $data)
    {
        $req = $this->request->post('transfers', $data, $this->apiKey);

        return $req;
    }

    /**
     * @return \stdClass
     */
    public function all()
    {
        $req = $this->request->get('transfers', $this->apiKey);

        return $req;
    }
}
