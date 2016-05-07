<?php

namespace Mateusjatenee\Iugu;

use Mateusjatenee\Iugu\Util\Request;

class Subscription
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

    public function create(array $data)
    {
        $req = $this->request->post('subscriptions', $data, $this->apiKey);

        return $req;
    }
}
