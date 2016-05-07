<?php

namespace Mateusjatenee\Iugu;

use Mateusjatenee\Iugu\Util\Request;

class Token
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

    /**
     * @param array $data
     *
     * @return stdClass
     */
    public function create(array $data)
    {
        // $req = $this->post('payment_token', $data);
        // return $req;
        $fields = http_build_query($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.iugu.com/v1/payment_token');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result);
    }
}
