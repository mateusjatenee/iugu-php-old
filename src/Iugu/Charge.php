<?php

namespace Mateusjatenee\Iugu;

use Mateusjatenee\Iugu\Util\Request;

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
     *
     * @return stdClass
     */
    public function create($data)
    {
        $req = $this->post('charge', $data, $this->apiKey);

        return $req;
    }
}
