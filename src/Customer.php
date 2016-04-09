<?php

namespace Iugu;

use Iugu\Util\Request;

class Customer extends Request
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
        parent::__construct();
    }

    /**
     * @param array $data
     *
     * @return stdClass
     */
    public function create(array $data)
    {
        $req = $this->postRequest('customers', $data, $this->apiKey);

        return $req;
    }

    /**
     * @param $id
     *
     * @return stdClass
     */
    public function fetch($id)
    {
        $req = $this->getRequest('customers/'.$id, $this->apiKey);

        return $req;
    }

    /**
     * @param $id
     *
     * @return \stdClass
     */
    public function delete($id)
    {
        $req = $this->deleteRequest('customers/'.$id, $this->apiKey);

        return $req;
    }

    /**
     * @param $options
     *
     * @return array
     */
    public function all($options = null)
    {
        $req = $this->getRequest('customers', $this->apiKey, $options);

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
