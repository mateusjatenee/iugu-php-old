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
        $req = $this->postRequest('customers/' . $id . '/payment_methods', $data, $this->apiKey);
        return $req;
    }

    public function fetch($userId, $paymentId)
    {
        $url = 'customers/' . $userId . '/payment_methods/' . $paymentId;
        $req = $this->getRequest($url, $this->apiKey);
        return $req;
    }
}
