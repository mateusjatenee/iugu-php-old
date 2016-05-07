<?php

namespace Mateusjatenee\Iugu;

use Mateusjatenee\Iugu\Util\Request;

class MarketPlace
{
    private $apiKey;
    private $request;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->request = new Request;
    }

    public function subAccount()
    {
        return new SubAccount($this->apiKey);
    }
}
