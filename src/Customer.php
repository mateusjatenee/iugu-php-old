<?php

namespace Iugu;

use Iugu\Util\Request;

class Customer extends Request
{
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

}
