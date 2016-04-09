<?php

namespace Iugu;

use Iugu\Util\Request;

class Transfer extends Request
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
     * @return \stdClass
     */
    public function create(array $data)
    {
        $req = $this->postRequest('transfers', $data, $this->apiKey);

        return $req;
    }

    /**
     * @return \stdClass
     */
    public function all()
    {
        $req = $this->getRequest('transfers', $this->apiKey);

        return $req;
    }
}
