<?php

namespace Iugu;

use Iugu\Util\Request;

class Subscription extends Request
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

    public function create(array $data)
    {
        $req = $this->postRequest('subscriptions', $data, $this->apiKey);

        return $req;
    }
}
