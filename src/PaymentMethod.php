<?php

namespace Iugu;

use Iugu\Util\Request;

class PaymentMethod extends Request
{
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function create($id, array $data)
    {
        $this->postRequest('customers/' . $id . '/payment_methods', $data, $this->apiKey);
    }
}
