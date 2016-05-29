<?php

namespace Mateusjatenee\Iugu;

use Mateusjatenee\Iugu\Util\Request;

class PaymentMethod
{
    /**
     * @var string
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
        $this->request = new Request();
    }

    /**
     * @param $id
     *
     * @return stdClass
     */
    public function all($id)
    {
        $req = $this->request->get('customers/'.$id.'/payment_methods');

        return $req;
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return stdClass
     */
    public function create($id, array $data)
    {
        $req = $this->request->post('customers/'.$id.'/payment_methods', $data, $this->apiKey);

        return $req;
    }

    /**
     * @param $userId
     * @param $paymentId
     *
     * @return stdClass
     */
    public function fetch($userId, $paymentId)
    {
        $url = 'customers/'.$userId.'/payment_methods/'.$paymentId;
        $req = $this->request->get($url, $this->apiKey);

        return $req;
    }

    /**
     * @param $userId
     * @param $paymentId
     *
     * @return stdClass
     */
    public function delete($userId, $paymentId)
    {
        $url = 'customers/'.$userId.'/payment_methods/'.$paymentId;
        $req = $this->request->delete($url, $this->apiKey);

        return $req;
    }
}
