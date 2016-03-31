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

    public function create(array $data)
    {
        $req = $this->postRequest('customers', $data, $this->apiKey);
        return $req;
    }

    public function fetch($id)
    {
        $req = $this->getRequest('customers/' . $id, $this->apiKey);
        return $req;
    }

    public function delete($id)
    {
        $req = $this->deleteRequest('customers/' . $id, $this->apiKey);
        return $req;
    }

    public function all($options = null)
    {
        $req = $this->getRequest('customers', $this->apiKey, $options);
        return $req;
    }

    public function payment()
    {
        return new PaymentMethod();
    }

}
