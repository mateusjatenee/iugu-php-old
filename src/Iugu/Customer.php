<?php

namespace Mateusjatenee\Iugu;

use Mateusjatenee\Iugu\Util\Request;

class Customer
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
        $this->request = new Request;
    }

    /**
     * @param array $data
     *
     * @return stdClass
     */
    public function create(array $data)
    {
        $req = $this->request->post('customers', $data, $this->apiKey);

        return $req;
    }

    /**
     * @param $id
     *
     * @return stdClass
     */
    public function fetch($id)
    {
        $req = $this->request->get('customers/' . $id, $this->apiKey);

        return $req;
    }

    /**
     * @param $id
     *
     * @return \stdClass
     */
    public function delete($id)
    {
        $req = $this->request->delete('customers/' . $id, $this->apiKey);

        return $req;
    }

    /**
     * @param $options
     *
     * @return array
     */
    public function all($options = null)
    {
        $req = $this->request->get('customers', $this->apiKey, $options);

        return $req;
    }

    /**
     * @return Iugu\PaymentMethod
     */
    public function payment()
    {
        return new PaymentMethod($this->apiKey);
    }
}
