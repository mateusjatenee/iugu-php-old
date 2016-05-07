<?php

namespace Mateusjatenee\Iugu;

use Mateusjatenee\Iugu\Util\Request;

class MarketPlace
{
    /**
     * @var mixed
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

    public function subAccount()
    {
        return new SubAccount($this->apiKey);
    }
}
