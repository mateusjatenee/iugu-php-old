<?php

namespace Mateusjatenee\Iugu;

use Mateusjatenee\Iugu\Util\Request;

class Invoice
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
     * @return mixed
     */
    public function create(array $data)
    {
        $req = $this->request->post('invoices', $data, $this->apiKey);

        return $req;
    }
}
