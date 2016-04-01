<?php

namespace Iugu;

use Iugu\Util\Request;

class MarketPlace extends Request
{
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function subAccount()
    {
        return new SubAccount($this->apiKey);
    }
}
