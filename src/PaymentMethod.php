<?php

namespace Iugu;

use Iugu\Util\Request;

class PaymentMethod extends Request
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
    }

    /**
     * @param $id
     * @return stdClass
     */
    public function all($id)
    {
        $req = $this->getRequest('customers/' . $id . '/payment_methods');
        return $req;
    }

    /**
     * @param $id
     * @param array $data
     * @return stdClass
     */
    public function create($id, array $data)
    {
        $req = $this->postRequest('customers/' . $id . '/payment_methods', $data, $this->apiKey);
        return $req;
    }

    /**
     * @param $userId
     * @param $paymentId
     * @return stdClass
     */
    public function fetch($userId, $paymentId)
    {
        $url = 'customers/' . $userId . '/payment_methods/' . $paymentId;
        $req = $this->getRequest($url, $this->apiKey);
        return $req;
    }

    /**
     * @param $userId
     * @param $paymentId
     * @return stdClass
     */
    public function delete($userId, $paymentId)
    {
        $url = 'customers/' . $userId . '/payment_methods/' . $paymentId;
        $req = $this->deleteRequest($url, $this->apiKey);
        return $req;
    }
}
